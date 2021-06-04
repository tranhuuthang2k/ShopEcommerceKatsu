<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
class socialiteController extends Controller
{
    //
    public function loginGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('Google')->user();
        if (!$googleUser) {
            return 'Can not authenticate';
        }
        $systemUser = User::where('google_id', '=', $googleUser->id)->first(); // kiểm tra trong database
        if (!$systemUser) {
            // nếu chưa có thì tạo
            $systemUser = User::Create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
            ]);
        }
        return $this->loginAndRedirect($systemUser); // tạo xong thì login vô luôn
    }

    //login fb
    public function facebookCallback(request $request)
    {
        $facebookUser = Socialite::driver('Facebook')->user();

        if (!$facebookUser) {
            return 'Can not authenticate';
        }

        $systemUser = User::where(
            'facebook_id',
            '=',
            $facebookUser->id
        )->first();

        // if user not currently on our system
        if (!$systemUser) {
            $systemUser = User::Create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email ?? '',
                'facebook_id' => $facebookUser->id,
            ]);
        }

        return $this->loginAndRedirect($systemUser);
    }
    protected function loginAndRedirect($user)
    {
        Auth::loginUsingId($user->id);
        if (Auth::user()->role->name == 'admin') {
            $routeTo = 'AdminHome';
        } elseif (Auth::user()->role->name == 'user') {
            $routeTo = 'home';
        } else {
            // else???
        }

        return redirect()->route($routeTo);
    }
}
