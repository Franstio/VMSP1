<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RecruitmentDetail
 *
 * @property int $permitId
 * @property string $name
 * @property string $gender
 * @property string $visitDate
 * @property string $photo
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail wherePermitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentDetail whereVisitDate($value)
 * @mixin \Eloquent
 */
class RecruitmentDetail extends Model
{
    use HasFactory;
    protected $table = 'recruitment_detail';
    public $timestamps=false;
    protected $primaryKey = 'permitId';
    protected $fillable = [
        'permitId','name','gender','visitDate','photo'
    ];
}
