<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Temperature
 *
 * @property int $id
 * @property string|null $nik
 * @property string|null $namevisitor
 * @property string|null $accDateTime
 * @property string|null $accDate
 * @property string|null $accTime
 * @property string|null $temperature
 * @property string|null $statusTemp
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereAccDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereAccDateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereAccTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereNamevisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereStatusTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereTemperature($value)
 * @mixin \Eloquent
 */
class Temperature extends Model
{
    use HasFactory;

    protected $table = "Temperature";
    public $timestamps = false;

    protected $fillable = [
        "nik",
        "nameVisitor",
        "accDateTime",
        "accDate",
        "accTime",
        "temperature",
        "statusTemp",
    ];
}
