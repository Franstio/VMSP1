<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Permitvip
 *
 * @property int $id_permit
 * @property string|null $subDate
 * @property string|null $nameVendor
 * @property string|null $namaVisitor
 * @property string|null $nik
 * @property string|null $noBadge
 * @property string|null $purpose
 * @property string|null $name
 * @property string|null $startDate
 * @property string|null $endDate
 * @property string|null $nameLocation
 * @property string|null $postby
 * @property string|null $status
 * @property string|null $photo
 * @property string|null $idType
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereIdPermit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNamaVisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNoBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereSubDate($value)
 * @mixin \Eloquent
 */
class Permitvip extends Model
{
    use HasFactory;
    protected $table = 'permitvip';
    public $timestamps=false;
    protected $primaryKey = 'id_permit';
    protected $fillable = [
        'subDate','nameVendor','namaVisitor','nik','noBadge','purpose','name','startDate','endDate','nameLocation','postby','status','photo'
    ];
}
?>