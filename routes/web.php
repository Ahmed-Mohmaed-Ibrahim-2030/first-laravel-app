<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userPhoneController;
use App\Http\Controllers\UserController;

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
route::view('about-me','about')->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('articles',userPhoneController::class)->middleware(['auth']);
//Route::resource('articles',userPhoneController::class)->middleware(['auth']);
Route::get('create',[\App\Http\Controllers\manager\ManagerController::class,'create']);
Route::post('create',[\App\Http\Controllers\manager\ManagerController::class,'store'])->name('create');
require __DIR__.'/auth.php';
