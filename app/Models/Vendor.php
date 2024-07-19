<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Vendor
 *
 * @property int $id_vendor
 * @property string|null $nameVendor
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereIdVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePostdate($value)
 * @mixin \Eloquent
 */
class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendor';
    public $timestamps=false;
    protected $primaryKey = 'id_vendor';
    protected $fillable = [
        'nameVendor','postby','postdate'
    ];
}
