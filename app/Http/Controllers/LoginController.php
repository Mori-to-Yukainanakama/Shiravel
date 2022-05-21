<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * ログイン
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['message' => 'ログインしました'], 200);
        }

        return response()->json(['message' => 'ログインに失敗しました'], 401);
    }

    /**
     * ログアウト
     */
    public function logout(Request $request)
    {
        Auth::logout();
        // sessionを破棄する
        $request->session()->invalidate();
        return response()->json(['message' => 'ログアウトしました'], 200);
    }
}
