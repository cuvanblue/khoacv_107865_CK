<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TestController;
use \App\Http\Controllers\admin\LoginController;
use \App\Http\Controllers\admin\LopController;
use App\Http\Controllers\admin\TinTucController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login',[TinTucController::class,'index'])->name('login');
Route::post('/admin/home',[TinTucController::class,'postlogin']);

//Route::get('/admin/lop/add',[LopController::class,'create'])->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('tintuc')->group(function () {
            Route::get('add',[TinTucController::class,'create']);
            Route::post('add',[TinTucController::class,'postcreate']);
            Route::get('list/{number?}',[TinTucController::class,'list']);
            Route::get('edit/{tintuc}',[TinTucController::class,'edit']);
            Route::post('edit/{tintuc}',[TinTucController::class,'postedit']);
            Route::DELETE('delete',[LopController::class,'delete']);
            Route::get('search',[LopController::class,'getsearch']);
            Route::get('search-action',[LopController::class,'searchaction']);
        });
    });
});

