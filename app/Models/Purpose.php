<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Purpose
 *
 * @property int $id_purpose
 * @property string|null $purpose
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Purpose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purpose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purpose query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purpose whereIdPurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purpose wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purpose wherePostdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purpose wherePurpose($value)
 * @mixin \Eloquent
 */
class Purpose extends Model
{
    use HasFactory;
    protected $table = 'purpose';
    public $timestamps=false;
    protected $primaryKey = 'id_purpose';
    protected $fillable = [
        'purpose','postby','postdate'
    ];
}
