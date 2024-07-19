<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transaksi
 *
 * @property int $id
 * @property string|null $namaVisitor
 * @property string|null $nik
 * @property string|null $purpose
 * @property string|null $nameVendor
 * @property string|null $name
 * @property string|null $temp
 * @property string|null $timeCheckin
 * @property string|null $timeCheckout
 * @property string|null $statusPermit
 * @property string|null $noBadge
 * @property string|null $Rfid
 * @property string|null $noVest
 * @property string|null $kondisi
 * @property string|null $nameLocation
 * @property string|null $zone
 * @property string|null $photo
 * @property int|null $permitID
 * @property string|null $barangBawaan
 * @property int|null $postby
 * @property string|null $reason
 * @property string|null $idType
 * @property string|null $timeBreakIN
 * @property string|null $timeBreakOut
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereBarangBawaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKondisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNamaVisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNoBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNoVest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePermitID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereRfid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereStatusPermit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeBreakIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeBreakOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeCheckin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeCheckout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereZone($value)
 * @mixin \Eloquent
 */
class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public $timestamps=false;

    protected $fillable = [
        'nik','namaVisitor','purpose','nameVendor','name','temp','timeCheckin','nameLocation','noBadge','noVest','kondisi','photo','bawaBarang','barangBawaan','postby','reason'
    ];
}
