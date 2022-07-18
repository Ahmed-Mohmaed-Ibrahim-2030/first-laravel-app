<?php

use App\Http\Controllers\manager\ManagerController;
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
//Router::group('manager',)
Route::controller(ManagerController::class)->prefix('manager')->name('manager.')->group(function () {
Route::get('create','create')->name('create');
Route::post('store','store')->name('store');
Route::get('/dashboard', function () {        return view('manager-Dashboard');    })->name('dashboard');
Route::get('login','login');
}
);

require __DIR__.'/auth.php';
