<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'user_name',    //用户名
        'email',        //邮箱
        'phone',        //手机号
        'avatar',       //头像
        'password',     //密码
        'status'        //状态：1 正常，2 禁用
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
