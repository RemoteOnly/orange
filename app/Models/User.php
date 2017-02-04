<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property bool $verify_email 是否邮箱验证
 * @property bool $verify_mobile 是否手机验证
 * @property string $lift_ban_time 解禁时间
 * @property int $level_id 用户等级id
 * @property string $last_visit_time 上次登录时间
 * @property string $last_visit_ip 上次访问的ip
 * @property string $register_ip 注册时的ip
 * @property string $register_rg_id 注册区域
 * @property bool $sex 性别， 0-男 1-女
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereVerifyEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereVerifyMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLiftBanTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLevelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastVisitTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastVisitIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRegisterIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRegisterRgId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereSex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereDeletedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
