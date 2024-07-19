<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Badge
 *
 * @property int $id_badge
 * @property string|null $Rfid
 * @property string|null $status
 * @property string|null $noBadge
 * @property string|null $nameType
 * @property string|null $reason
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Badge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Badge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Badge query()
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereIdBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereNameType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereNoBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge wherePostdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereRfid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereStatus($value)
 * @mixin \Eloquent
 */
class Badge extends Model
{
    use HasFactory;
    protected $table = 'badge';
    public $timestamps=false;
    protected $primaryKey = 'id_badge';
    protected $fillable = [
        'Rfid','status','noBadge','nameType','reason','postby','postdate'
    ];
}
