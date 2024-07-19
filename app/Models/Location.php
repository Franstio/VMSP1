<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Location
 *
 * @property int $id_location
 * @property string|null $nameLocation
 * @property string|null $zone
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereIdLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePostdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereZone($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    use HasFactory;
    protected $table = 'location';
    public $timestamps=false;
    protected $primaryKey = 'id_location';
    protected $fillable = [
        'nameLocation','zone','postby','postdate'
    ];
}
