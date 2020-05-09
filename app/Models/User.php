<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'user_name',    //用户名
        'email',        //邮箱
        'phone',        //手机号
        'avatar',       //头像
        'password',     //密码
        'status'        //状态：1 正常，2 禁用
    ];
}
