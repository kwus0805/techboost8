<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
  Route::get('news/create',[NewsController::class,'add'])->middleware('auth');
  Route::get('profile/create',[ProfileController::class,'add']);
  Route::get('profile/edit',[ProfileController::class,'edit']);

});
/*
//公式を参考
Route::get('flights', function () {
    // 認証済みのユーザーのみが入れる
})->middleware('auth');

*/

//元々書いてあったやつ
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
