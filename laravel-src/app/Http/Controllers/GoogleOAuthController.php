<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;
use Laravel\Socialite\Facades\Socialite;

/**
 * Google OAuth 関連 コントローラー
 */
class GoogleOAuthController extends Controller
{
    // サービス
    private AuthenticationService $service;

    /**
     * @param AuthenticationService $service
     */
    public function __construct(AuthenticationService $service)
    {
        $this->service = $service;
    }


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
    public function callback(Request $request)
    {
        try {
            // ログアウト
            $this->service->logout($request);

            // Socialiteによる Google OAuthの結果解析 (ユーザー情報取得)
            $googleUser = Socialite::driver('google')->stateless()->user();
            // ログイン実行
            $this->service->loginByEmail($googleUser->email);
            // 認証後の画面へ
            return redirect(route('dashboard'));
        } catch (UnauthorizedException $e) {
            // ログアウト
            $this->service->logout($request);
            // 認証できない => 401へ
            return redirect(route('login'), 401);
        }
    }
}
