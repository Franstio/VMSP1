<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role
 *
 * @property int $id_role
 * @property string|null $nameRole
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereIdRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereNameRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role wherePostdate($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    public $timestamps=false;
    protected $primaryKey = 'id_role';
    protected $fillable = [
      'nameRole','postby','postdate'
    ];
}
