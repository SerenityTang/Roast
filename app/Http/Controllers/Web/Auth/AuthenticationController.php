<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSocialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    public function getSocialRedirect($account)
    {
        try {
            return Socialite::with($account)->redirect();
        } catch (\InvalidArgumentException $e) {
            return redirect('/login');
        }
    }

    public function getSocialCallback($account)
    {
        // 从第三方 OAuth 回调中获取用户信息
        $socialUser = Socialite::with($account)->user();
        dd($socialUser);
        // 在本地 user_socialites 表中查询该用户来判断是否已存在
        $userSocialite = UserSocialite::where('oauth_id', $socialUser->id)->where('oauth_type', $account)->first();
        if (!$userSocialite) {
            // 如果该用户不存在则将其保存到 users 表
            $newUser = new User();
            $newUser->user_name = $socialUser->getName();
            $newUser->email = $socialUser->getEmail() == '' ? '' : $socialUser->getEmail();
            $newUser->phone = $socialUser->getPhone() == '' ? '' : $socialUser->getPhone();
            $newUser->avatar = $socialUser->getAvatar();
            if ($newUser->save()) {
                $us = UserSocialite::create([
                    'user_id' => $newUser->id,
                    'oauth_type' => $account,
                    'oauth_id' => $socialUser->id,
                ]);
                if ($us) {
                    // 手动登录该用户
                    Auth::login($newUser);

                    // 登录成功后将用户重定向到首页
                    return redirect('/');
                }
            }
        }
    }
}
