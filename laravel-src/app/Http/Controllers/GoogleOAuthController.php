<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * Google OAuth 関連 コントローラー
 */
class GoogleOAuthController extends Controller
{
    /**
     * Socialiteによる Google OAuthの認証画面 表示
     * @return \Illuminate\Http\RedirectResponse|Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Google OAuthのログイン 認証成功 ハンドリング
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function callback()
    {
        // Socialiteによる Google OAuthの結果解析 (ユーザー情報取得)
        $googleUser = Socialite::driver('google')->stateless()->user();
        // Google 認証でのメアドの人
        $user = User::where(['email' => $googleUser->email])->first();
        // 見つからない => 401
        if (is_null($user)) return redirect(route('login'), 401);
        // 認証
        Auth::login($user, true);
        // 認証後の画面へ
        return redirect(route('dashboard'));
    }
}
