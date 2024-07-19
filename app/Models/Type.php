<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Type
 *
 * @property int $id_type
 * @property string|null $nameType
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereNameType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type wherePostdate($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    use HasFactory;
    protected $table = 'type';
    public $timestamps=false;
    protected $primaryKey = 'id_type';
    protected $fillable = [
        'nameType','postby','postdate'
    ];
}
