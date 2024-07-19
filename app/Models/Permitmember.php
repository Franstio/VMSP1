<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Permitmember
 *
 * @property int $id
 * @property int|null $permit_id
 * @property string|null $nik
 * @property string|null $jabatan
 * @property string|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember wherePermitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitmember whereStatus($value)
 * @mixin \Eloquent
 */
class Permitmember extends Model
{
    protected $table = 'permitmember';
    public $timestamps=false;
   
    protected $fillable = [
        'permit_id','nik','jabatan','status'
    ];
}
