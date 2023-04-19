<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

/**
 * 認証関連サービス
 */
class AuthenticationService
{
    // リポジトリ
    private UserRepository $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * メールアドレス ログイン
     * @param string $email ログインするメールアドレス
     * @return User ログインした人
     */
    public function loginByEmail(string $email = ''): User
    {
        // 前提条件
        if (empty($email)) throw new UnauthorizedException('user is not found');

        // メアド認証 ログイン実行
        $user = $this->repository->findByEmail($email);
        // 見つからない
        if (is_null($user)) throw new UnauthorizedException('user is not found');

        // 認証
        Auth::login($user, true);
        // 結果返却
        return $user;
    }

    /**
     * ログアウト
     * @param Request $request ログアウトする通信
     */
    public function logout(Request $request)
    {
        // 認証状態 削除
        Auth::guard('web')->logout();
        // セッションクリア
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
