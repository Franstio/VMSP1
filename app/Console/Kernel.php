<?php

namespace App\Console;

use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use App\Models\Visitor;
use App\Models\Permit;
use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    private $client;
    private $apiKey;
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('demo:cron')
            ->everyMinute();
        $schedule->call(function () {
            $this->storeRegisterNew();
        })->everyMinute()->appendOutputTo(storage_path('log.txt'));
        $schedule->call(function () {
            $this->storePermit();
        })->everyMinute()->appendOutputTo(storage_path('log-permit.txt'));
    }
    public function storeRegisterNew()
    {
        $this->client = new Client(['headers' => ["APIKEY" => "328a3a2385ce0df6b089763ffb27d7e9"]]);
        $response = $this->client->request('GET', "https://api.jotform.com/form/232362622358455/submissions", [
            'verify' => false
        ]);
        // Get the JSON response body
        $hasil = json_decode($response->getBody(), true);
        $listJF = [];
        foreach ($hasil['content'] as $data) {


            if ($data['status'] == 'ACTIVE') {


                $dictJF = new Visitor();

                //$dictJF->id = $data['id'];
                $dictJF['date'] = Carbon::now();

                $dictJF->nameVendor = $data['answers']['115']['answer'] == 'OTHER'
                    ? $data['answers']['115']['answer']
                    : $data['answers']['115']['answer'];

                $dictJF->asalVendor = $data['answers']['117']['answer'];

                $dictJF->email = $data['answers']['93']['answer'];

                $dictJF->namaVisitor = $data['answers']['95']['answer'];

                $dictJF->nik = $data['answers']['96']['answer'];

                $dictJF->gender = $data['answers']['97']['answer'];

                $dictJF->jabatan = $data['answers']['98']['answer'];

                $dictJF->q1 = $data['answers']['141']['answer'];

                $dictJF->q2 = $data['answers']['142']['answer'];

                $dictJF->q3 = $data['answers']['143']['answer'];



                $dictJF->q4 = $data['answers']['145']['answer'];

                $dictJF->q5 = $data['answers']['147']['answer'];

                $dictJF->q6 = $data['answers']['148']['answer'];


                $dictJF->sign =  $dictJF->nik . ".jpg";

                $imageUrl = $data["answers"]['100']["answer"];
                $res = $this->client->request('GET', $imageUrl, ['verify' => false]);
                Storage::disk('public')->put($dictJF->nik . ".jpg", $res->getBody()->getContents());

                $signImageUrl = $data['answers']['149']['answer'];
                $res = $this->client->request('GET', $signImageUrl, ['verify' => false]);
                Storage::disk('public')->put("sign/" . $dictJF->sign, $res->getBody()->getContents());
                Visitor::create([
                    'date' => date('Y-m-d H:i:s'),
                    'nameVendor' => $dictJF->nameVendor,
                    'asalVendor' => $dictJF->asalVendor,
                    'email' => $dictJF->email,
                    'namaVisitor' => $dictJF->namaVisitor,
                    'nik' => $dictJF->nik,
                    'gender' => $dictJF->gender,
                    'jabatan' => $dictJF->jabatan,
                    //'photo' => $dictJF->photo,
                    'photo' => $dictJF->nik . '.jpg',
                    'typeVisitor' => "Non Residence",
                    'q1' => $dictJF->q1,
                    'q2' => $dictJF->q2,
                    'q3' => $dictJF->q3,
                    'q4' => $dictJF->q4,
                    'q5' => $dictJF->q5,
                    'q6' => $dictJF->q6,
                    'sign' => $dictJF->sign,
                ]);

                //$dictJF->save();
                //submissionId = $data['id'];
                $response = $this->client->request('delete', "https://api.jotform.com/form/232362622358455/submissions", [
                    'verify' => false,
                ]);
                return response()->json($dictJF);
            }
            dd($data);
        }
    }
    public function storePermit()
    {
        $this->client = new Client(['headers' => ["APIKEY" => "328a3a2385ce0df6b089763ffb27d7e9"]]);
        $response = $this->client->request('GET', "https://api.jotform.com/form/232362248041448/submissions", [
            'verify' => false,
        ]);

        // Get the JSON response body
        $hasil = json_decode($response->getBody(), true);
        error_log("MASUKK a");
        //$hasil = $response->json();
        $listJF = [];

        foreach ($hasil["content"] as $data) {
            if ($data['status'] == 'ACTIVE') {
                $dictJF = new Permit();
                //$dictJF['id'] = $data['id'];
                $dictJF['subDate'] = Carbon::now();

                $dictJF->nameVendor = $data['answers']['63']['answer'] == 'OTHER'
                    ? $data['answers']['86']['answer']
                    : $data['answers']['63']['answer'];

                $dictJF['startDate'] = Carbon::createFromFormat('d-m-Y H:i', $data['answers']['46']['prettyFormat']);

                $dictJF['endDate'] = Carbon::createFromFormat('d-m-Y H:i', $data['answers']['56']['prettyFormat']);

                if (isset($data['answers']['59'], $data['answers']['59']['answer'])) {
                    $dictJF['purpose'] = $data['answers']['59']['answer'];
                } else {
                    // Handle the case when '89' key or 'answer' key is missing or null in $data['answers']
                    // For example, set 'purpose' to null or a default value as needed.
                    $dictJF['purpose'] = null; // Or set a default value, e.g., "Unknown Purpose".
                }

                if (isset($data['answers']['59']['answer']) && ($data['answers']['59']['answer'] == 'WORKING' || $data['answers']['59']['answer'] == 'OVERTIME')) {
                    $dictJF['permitNo'] = $data['answers']['15']['answer'] ?? "NO DATA ENTRY";
                    $dictJF['desk'] = $data['answers']['16']['answer'] ?? "";
                } else {
                    $dictJF['permitNo'] = "";
                    $dictJF['desk'] = "";
                }


                $dictJF['email'] = $data['answers']['28']['answer'];

                if (isset($data['answers']['66']) && isset($data['answers']['66']['answer'])) {
                    $name = $data['answers']['66']['answer'];
                } else {
                    // Handle the case when '66' key or 'answer' key is missing or null in $data['answers']
                    // For example, set $name to null or a default value as needed.
                    $name = null; // Or set a default value for $name.
                }

                // Check if '71' key and 'answer' key exist in the $data['answers'] array
                if (isset($data['answers']['71']) && isset($data['answers']['71']['answer'])) {
                    $empID = $data['answers']['71']['answer'];
                } else {
                    // Handle the case when '71' key or 'answer' key is missing or null in $data['answers']
                    // For example, set $empID to null or a default value as needed.
                    $empID = null; // Or set a default value for $empID.
                }

                $dictJF['name'] = "{$name}:{$empID}";
                $dictJF['host'] = $empID;
                $dictJF['sign'] = $data['answers']['47']['answer'];

                $anggota = json_decode($data['answers']['51']['answer'], true);

                $listAnggota = $anggota;
                /*foreach ($anggota as $a) {
                        $data = Visitor::where(['nik' => $req->nik])->first();;
                        if (isset($visitor['nik'])) {
                            $a['Register'] = 'ya';
                        } else {
                            $a['Register'] = 'tidak';
                        }

                        array_push($listAnggota, $a);
                    }*/

                $dictJF['anggota'] = json_encode($listAnggota);


                $dictJF['bawaBarang'] = $data['answers']['54']['answer'] ?? "";
                $dictJF['barangBawaan'] = $dictJF['bawaBarang'] == "YA" ? $data['answers']['55']['answer'] : null;






                /*   if (isset($data['answers']['54']['answer']) && $data['answers']['54']['answer'] == "YA") {
                        $dictJF['barangBawaan'] = isset($data['answers']['55']['answer']) ? $data['answers']['55']['answer'] : '';
                    } else {
                        $dictJF['barangBawaan'] = "";
                    } */

                $dictJF["permitNo"] = null;
                $dictJF['desk'] = null;
                if (isset($data['answers']['59']) && isset($data['answers']['59']['answer'])) {
                    if ($data['answers']['59']['answer'] == 'SUPPLY') {
                        // Check if '64' key and 'answer' key exist in the $data['answers'] array
                        if (isset($data['answers']['64']) && isset($data['answers']['64']['answer'])) {
                            $dictJF['nameLocation'] = $data['answers']['64']['answer'];
                        } else {
                            // Handle the case when '64' key or 'answer' key is missing or null in $data['answers']
                            // For example, set 'nameLocation' to null or a default value as needed.
                            $dictJF['nameLocation'] = null; // Or set a default value for 'nameLocation'.
                        }

                        // Check if '65' key and 'answer' key exist in the $data['answers'] array
                        if (isset($data['answers']['65']) && isset($data['answers']['65']['answer'])) {
                            $dictJF['supplyBarang'] = $data['answers']['65']['answer'];
                        } else {
                            // Handle the case when '65' key or 'answer' key is missing or null in $data['answers']
                            // For example, set 'supplyBarang' to null or a default value as needed.
                            $dictJF['supplyBarang'] = null; // Or set a default value for 'supplyBarang'.
                        }

                        $dictJF['status'] = "approved";
                    } elseif ($data['answers']['59']['answer'] == 'MEETING') {
                        $dictJF['status'] = "waitinghost";
                        $dictJF['nameLocation'] = "";
                        $dictJF['supplyBarang'] = '';
                    } else {
                        $dictJF['status'] = "waitinghost";
                        $dictJF['nameLocation'] = "";
                        $dictJF['supplyBarang'] = '';
                        $dictJF["permitNo"] = $data['answers']['15']['answer'];
                        $dictJF['desk'] = $data['answers']['16']['answer'];
                    }
                } else {
                    // Handle the case when '59' key or 'answer' key is missing or null in $data['answers']
                    // For example, set default values for 'nameLocation', 'supplyBarang', and 'status'.
                    $dictJF['nameLocation'] = "";
                    $dictJF['supplyBarang'] = '';
                    $dictJF['status'] = "waitinghost";
                }
                //$this->insertPermit($dictJF);

                Permit::create([
                    'subDate' => date('Y-m-d H:i:s'),
                    'nameVendor' => $dictJF->nameVendor,
                    'startDate' => $dictJF->startDate,
                    'endDate' => $dictJF->endDate,
                    'purpose' => $dictJF->purpose,
                    'nameLocation' => $dictJF->nameLocation,
                    'supplyBarang' => $dictJF->supplyBarang,
                    'permitNo' => $dictJF->permitNo,
                    'desk' => $dictJF->desk,
                    'anggota' => $dictJF->anggota,
                    'email' => $dictJF->email,
                    'name' => $dictJF->name,
                    'bawaBarang' => $dictJF->bawaBarang,
                    'barangBawaan' => $dictJF->barangBawaan,
                    'sign' => $dictJF->sign,
                    'status' => $dictJF->status,
                    'host' => $dictJF->host
                ]);
            }
            $response = $this->client->request('delete', "https://api.jotform.com/form/232362248041448/submissions", [
                'verify' => false,
            ]);
        }
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
