<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Visitor
 *
 * @property int $id
 * @property string|null $date
 * @property string|null $nameVendor
 * @property string|null $asalVendor
 * @property string|null $email
 * @property string|null $namaVisitor
 * @property string|null $nik
 * @property string|null $gender
 * @property string|null $jabatan
 * @property string|null $photo
 * @property string|null $postby
 * @property string|null $postdate
 * @property string|null $q1
 * @property string|null $q2
 * @property string|null $q3
 * @property string|null $q3b
 * @property string|null $q4
 * @property string|null $q5
 * @property string|null $q6
 * @property string|null $sign
 * @property string|null $typeVisitor
 * @property string|null $idType
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereAsalVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereNamaVisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor wherePostdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQ1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQ2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQ3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQ3b($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQ4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQ5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQ6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereTypeVisitor($value)
 * @mixin \Eloquent
 */
class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitor';
    public $timestamps = false;

    protected $fillable = [
        'date','nameVendor','asalVendor','email','namaVisitor','nik','gender','jabatan','photo','postby','postdate','q1','q2','q3','q4','q5','q6','sign','typeVisitor'
    ];
}
