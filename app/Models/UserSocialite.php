<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialite extends Model
{
    protected $table = 'user_socialites';

    protected $fillable = [
        'user_id',          //用户ID
        'oauth_type',       //oauth 类型
        'oauth_id',         //oauth ID
    ];
}
