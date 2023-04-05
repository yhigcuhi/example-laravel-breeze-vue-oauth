# example-laravel-breeze-vue-oauth
Laravel + vue SPA + Google OAuth + Inertia(Breezeなし) の実験

## 環境
|項目|バージョン|
|:---|:---:|
|php|8.1（openlightspeedのため phpバージョン複数管理可能らしいので）|
|laravel|10（2023.04.02 php 8.1での最新）|
|nginx|とりあえず最新（開発用なので）|
|postgres|13（都合上）|

## 環境構築: laravel
```bash
$ composer create-project laravel/laravel .
$ composer require laravel/socialite --dev
$ composer install
$ curl https://www.toptal.com/developers/gitignore/api/vim,vue,node,linux,macos,laravel,windows,composer,intellij,sublimetext,visualstudio,visualstudiocode >> .gitignore
``` 

## 環境構築: Google OAuth
[laravel/socialite Google OAuth 参考](https://zenn.dev/naoki_oshiumi/articles/80ab178d958447)
[laravel/socialite + breeze Laravel 10のカスタマイズ 参考](https://reffect.co.jp/laravel/socialiote)

- socialiteインストール
```bash
$ composer require laravel/socialite --dev
```

service.phpとenvの内容に Google OAuthの設定を記載

## 環境構築: vue on Laravel + Inertia
```bash
$ npm install && npm run dev
$ npm install -D bootstrap lodash @types/lodash @tailwindcss/forms autoprefixer postcss tailwindcss
```

## 資材管理
- バックエンド: laravel
- ルーティング定義: inertiaで laravelとvueを結合
- フロントエンド: vue (index.htmlの代わりだけ blade)

※ vueとしては typescript で実装
※ SPA + RESTfull で可能な限り実装

/
    ┗ /docker (コンテナごとの Docker File)
        ┗ /nginx
            ┗ Dcokerfile
        ┗ /php
            ┗ Dcokerfile
        ┗ /postgres
            ┗ Dcokerfile
    ┗ /db  (postgresのマウント先)
    ┗ /laravel-src (laravel + vueソース)
        ┗ /resources
            ┗ /js
                ┗ /components (最小な共通部品ごと)
                    ┗ /layouts (部品ごと)
                ┗ /fetures (表示する画面ごと)
                    ┗ /auth (認証画面)
                        ┗ /signin
                            ┗ /components (ログイン画面の部品ごと)
                            ┗ SignIn.vue (ログイン画面)
                    ┗ /authrized (認証・認可後の画面)
                        ┗ /dashboard
                            ┗ /components (ダッシュボード画面の部品ごと)
                            ┗ Dashbord.vue (ダッシュボード画面: ログイン後のトップ)
                        ┗ /xx
                            ┗ /components (ログイン後の画面の部品ごと)
                            ┗ XXX.vue (ログイン後の画面)
                ┗ /store (共通グローバルストアの内容)
                ┗ app.ts (エントリーポイント)
            ┗ /view
                ┗ app.blade.php (エントリーポイント)
            ┗ .env (laravel 用:基本何もしない docker から反映する)
    ┗ /swagger (REST API設計用)
    ┗ docker-compose.yml
    ┗ .env (docker compose用)