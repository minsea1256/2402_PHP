<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ------------------
// 유저 관련
// ------------------
Route::get('/', function () {
    return view('login');
})->name('get.login');

Route::post('/login', [UserController::class, 'login'])->name('post.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('retouch', function () {
    return view('retouch');
})->name('retouch.index');
Route::post('/retouch', [UserController::class, 'retouch'])->name('retouch.store');

// 이메일 체크
Route::post('user/chk', [UserController::class, 'emailChk']);

// ------------------
// 게시판 관련
// ------------------
Route::middleware('auth')->resource('/board', BoardController::class);