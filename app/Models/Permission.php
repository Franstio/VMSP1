<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string|null $menu
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission wherePostdate($value)
 * @mixin \Eloquent
 */
class Permission extends Model
{
    use HasFactory;
    protected $table = 'permission';
    public $timestamps=false;
}
