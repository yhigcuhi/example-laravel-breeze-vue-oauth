<?php

namespace App\Http\Controllers;

use App\Services\AuthenticationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 認証関連
 */
class AuthenticatedSessionController extends Controller
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
     * ログアウト処理
     */
    public function destroy(Request $request): RedirectResponse
    {
        // ログアウト
        $this->service->logout($request);
        // TOPへ
        return redirect(route(  'login'));
    }
}
