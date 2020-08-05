<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//論理削除
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    //論理削除
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
        // 'name', 'email', 'password',
    // ];

    protected $fillable = [
        'employee_code',
        'password',
        'family_name',
        'personal_name',
        'kana_family_name',
        'kana_personal_name',
        'affiliation_id',
        'position_id',
        'office_tel',
        'mobile_tel',
        'email',
        'join',
        'zipcode',
        'address',
        'home_tel',
        'birthdate',
        'auth_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /* protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */
}
