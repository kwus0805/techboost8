<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\NewsControllers;

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

Route::prefix('admin')->middleware(['auth'])->group(function() {
  Route::get('news/create',[NewsController::class,'add'])->name('news.add');
  Route::get('profile/create',[ProfileController::class,'add'])->name('profile.add');
  Route::get('profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
  Route::get('news',[NewsController::class,'index'])->name('news.index');
  Route::get('news/edit',[NewsController::class,'edit'])->name('news.edit');
  Route::get('news/delete',[NewsController::class,'delete'])->name('news.delete');
  Route::get('profile/delete',[ProfileController::class,'delete'])->name('profile.delete');
  Route::get('profile',[ProfileController::class,'index'])->name('profile.index');

  Route::post('news/create',[NewsController::class,'create'])->name('news.create');//追記＃１４
  Route::post('profile/create',[ProfileController::class,'create'])->name('profile.create');
  Route::post('profile/edit',[ProfileController::class,'update'])->name('profile.update');
  Route::post('news/edit',[NewsController::class,'update'])->name('news.update');


});

  Route::get('/','App\Http\Controllers\NewsControllers@index')->name('root');

//元々書いてあったやつ
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
