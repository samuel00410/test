<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\MemberController;
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

Route::get('/',[PageController::class,'home']);

Route::resource('/member', MemberController::class);                      //CRUD 帳戶
//Route::delete('/session', [MemberSessionController::class,'delete'])->name('session.delete');          //刪除的路徑
//Route::resource('session', MemberSessionController::class)->only([  //登入
//    'create',   //登入畫面
//    'store',    //登入產生出結果的路徑 
//]);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
