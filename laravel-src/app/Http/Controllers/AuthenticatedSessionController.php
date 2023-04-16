<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 認証関連
 */
class AuthenticatedSessionController extends Controller
{

    /**
     * ログアウト処理
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 認証状態 削除
        Auth::guard('web')->logout();
        // セッションクリア
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // TOPへ
        return redirect('/');
    }
}
