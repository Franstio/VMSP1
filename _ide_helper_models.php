<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Badge
 *
 * @property int $id_badge
 * @property string|null $Rfid
 * @property string|null $status
 * @property string|null $noBadge
 * @property string|null $nameType
 * @property string|null $reason
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Badge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Badge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Badge query()
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereIdBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereNameType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereNoBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge wherePostdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereRfid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Badge whereStatus($value)
 * @mixin \Eloquent
 */
	class Badge extends \Eloquent {}
}

namespace App\Models{
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
	class Depart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @property int $id_location
 * @property string|null $nameLocation
 * @property string|null $zone
 * @property string|null $postby
 * @property string|null $postdate
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereIdLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePostdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereZone($value)
 * @mixin \Eloquent
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
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
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permit
 *
 * @property int $id
 * @property int|null $noRegis
 * @property string|null $subDate
 * @property string|null $nameVendor
 * @property string|null $startDate
 * @property string|null $endDate
 * @property string|null $purpose
 * @property string|null $nameLocation
 * @property string|null $supplyBarang
 * @property string|null $permitNo
 * @property string|null $desk
 * @property string|null $anggota
 * @property string|null $email
 * @property string|null $name
 * @property string|null $bawaBarang
 * @property string|null $barangBawaan
 * @property string|null $sign
 * @property string|null $status
 * @property string|null $statusGenerate
 * @property string|null $uploadPermit
 * @property string|null $postby
 * @property int|null $permit_id
 * @property string|null $host
 * @property string|null $reason
 * @property string|null $idType
 * @method static \Illuminate\Database\Eloquent\Builder|Permit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereAnggota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereBarangBawaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereBawaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereDesk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereNoRegis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePermitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePermitNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereStatusGenerate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereSubDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereSupplyBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereUploadPermit($value)
 * @mixin \Eloquent
 */
	class Permit extends \Eloquent {}
}

namespace App\Models{
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
	class Permitmember extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permitvip
 *
 * @property int $id_permit
 * @property string|null $subDate
 * @property string|null $nameVendor
 * @property string|null $namaVisitor
 * @property string|null $nik
 * @property string|null $noBadge
 * @property string|null $purpose
 * @property string|null $name
 * @property string|null $startDate
 * @property string|null $endDate
 * @property string|null $nameLocation
 * @property string|null $postby
 * @property string|null $status
 * @property string|null $photo
 * @property string|null $idType
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereIdPermit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNamaVisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereNoBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permitvip whereSubDate($value)
 * @mixin \Eloquent
 */
	class Permitvip extends \Eloquent {}
}

namespace App\Models{
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
	class Purpose extends \Eloquent {}
}

namespace App\Models{
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
	class RecruitmentDetail extends \Eloquent {}
}

namespace App\Models{
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
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Temperature
 *
 * @property int $id
 * @property string|null $nik
 * @property string|null $namevisitor
 * @property string|null $accDateTime
 * @property string|null $accDate
 * @property string|null $accTime
 * @property string|null $temperature
 * @property string|null $statusTemp
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereAccDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereAccDateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereAccTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereNamevisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereStatusTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperature whereTemperature($value)
 * @mixin \Eloquent
 */
	class Temperature extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaksi
 *
 * @property int $id
 * @property string|null $namaVisitor
 * @property string|null $nik
 * @property string|null $purpose
 * @property string|null $nameVendor
 * @property string|null $name
 * @property string|null $temp
 * @property string|null $timeCheckin
 * @property string|null $timeCheckout
 * @property string|null $statusPermit
 * @property string|null $noBadge
 * @property string|null $Rfid
 * @property string|null $noVest
 * @property string|null $kondisi
 * @property string|null $nameLocation
 * @property string|null $zone
 * @property string|null $photo
 * @property int|null $permitID
 * @property string|null $barangBawaan
 * @property int|null $postby
 * @property string|null $reason
 * @property string|null $idType
 * @property string|null $timeBreakIN
 * @property string|null $timeBreakOut
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereBarangBawaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKondisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNamaVisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNameLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNameVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNoBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNoVest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePermitID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereRfid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereStatusPermit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeBreakIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeBreakOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeCheckin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTimeCheckout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereZone($value)
 * @mixin \Eloquent
 */
	class Transaksi extends \Eloquent {}
}

namespace App\Models{
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
	class Type extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $username
 * @property string|null $password
 * @property string|null $empID
 * @property string|null $Rfid
 * @property string|null $nameDepart
 * @property string|null $nameRole
 * @property string|null $email
 * @property string|null $photo
 * @property string|null $postby
 * @property string|null $updated_at
 * @property string|null $remember_token
 * @property string|null $created_at
 * @property string|null $takeover
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNameDepart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNameRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRfid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTakeover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class Vendor extends \Eloquent {}
}

namespace App\Models{
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
	class Vest extends \Eloquent {}
}

namespace App\Models{
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
	class Visitor extends \Eloquent {}
}

