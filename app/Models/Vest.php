<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Vest
 *
 * @property int $id_vest
 * @property string|null $noVest
 * @property string|null $status
 * @property string|null $reason
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Vest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vest whereIdVest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vest whereNoVest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vest wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vest wherePostdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vest whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vest whereStatus($value)
 * @mixin \Eloquent
 */
class Vest extends Model
{
    use HasFactory;
    protected $table = 'vest';
    public $timestamps=false;
    protected $primaryKey = 'id_vest';
    protected $fillable = [
        'noVest','status','reason','postby','postdate'
    ];
}
