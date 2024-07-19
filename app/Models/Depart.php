<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Depart
 *
 * @property int $id_depart
 * @property string|null $nameDepart
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Depart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Depart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Depart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereIdDepart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereNameDepart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart wherePostdate($value)
 * @mixin \Eloquent
 */
class Depart extends Model
{
    use HasFactory;
    protected $table = 'depart';
    public $timestamps=false;
    protected $primaryKey = 'id_depart';
    protected $fillable = [
        'nameDepart','postby','postdate'
    ];
}
