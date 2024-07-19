<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Permit
 *
 * @property int $id
 * @property int|null $noRegis
 * @property string|null $subDate
 * @property string|null $nameVendor
 * @property string|null $startDate
 * @property string|null $endDate
 * @property string|null $purpose
 * @property string|null $nameLocation
 * @property string|null $supplyBarang
 * @property string|null $permitNo
 * @property string|null $desk
 * @property string|null $anggota
 * @property string|null $email
 * @property string|null $name
 * @property string|null $bawaBarang
 * @property string|null $barangBawaan
 * @property string|null $sign
 * @property string|null $status
 * @property string|null $statusGenerate
 * @property string|null $uploadPermit
 * @property string|null $postby
 * @property int|null $permit_id
 * @property string|null $host
 * @property string|null $reason
 * @property string|null $idType
 * @method static \Illuminate\Database\Eloquent\Builder|Permit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereAnggota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereBarangBawaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereBawaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereDesk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereNoRegis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePermitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePermitNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereStatusGenerate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereSubDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereSupplyBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereUploadPermit($value)
 * @mixin \Eloquent
 */
class Permit extends Model
{
    use HasFactory;
    protected $table = 'permit';
    public $timestamps=false;
    protected $fillable = [
        'subDate',"supplyBarang",'nameVendor','startDate','endDate','purpose','nameLocation','permitNo','desk','anggota','email','name','bawaBarang','barangBawaan','sign','status','uploadPermit','permit_id','host'
    ];
}
?>