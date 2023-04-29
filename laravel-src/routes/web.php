<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\GoogleOAuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Breezeの Inertia 初期構築パクリ
//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

// ログイン画面
Route::get('/', function () {return Inertia::render('auth/login/Login');})->name('login');

// ログイン前 の画面定義
Route::middleware('guest')->group(function () {
    // Google OAuth 関連
    Route::group(['prefix' => '/google', 'as' => 'google.'], function() {
        // Google OAuthの画面呼び出し
        Route::get('/auth', [GoogleOAuthController::class, 'index'])->name('index');
        // Google OAuth成功結果
        // ※ Google Cloud Platformで URL localhost:8080/google/auth/callback 認めている
        Route::get('/auth/callback', [GoogleOAuthController::class, 'callback'])->name('callback');
    });
});
// ログイン直後 の画面定義
Route::middleware(['auth', 'verified'])->group(function () {
    // ダッシュボード
    Route::get('/home', function () { return Inertia::render('authed/dashboard/Dashboard');})->name('dashboard');
    Route::group(['prefix' => 'players', 'as' => 'players.'], function () {
        // 選手一覧
        Route::get('/', function () { return Inertia::render('authed/players/Players');})->name('list');
        // 選手詳細
    });
});

// ログイン済み の画面定義
Route::middleware('auth')->group(function () {
    // ログアウト
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
