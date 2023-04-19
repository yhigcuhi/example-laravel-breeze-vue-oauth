<?php

namespace App\Repositories;

use App\Models\User;

/**
 * User関連 リポジトリ
 */
class UserRepository
{
    /**
     * ユーザーメールアドレス検索
     * @param string $email 検索値
     * @return User|null 検索結果
     */
    public function findByEmail(string $email = ''): ?User
    {
        // 前提条件
        if (empty($email)) return null; // 検索対象外
        // 検索実行
        return User::where(['email' => $email])->first();
    }
}
