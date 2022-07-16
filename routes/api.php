<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\loginController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\UserPhonesController;
use App\Http\Controllers\apis\productcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('phones',UserPhonesController::class)->middleware('auth:sanctum');
Route::post('login',[loginController::class,'login']);
Route::get('logout',[loginController::class,'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test',function ()
{
   echo 'api';
   return response()->json(['name'=>'ahmed','age'=>'22'],200);
});
Route::get('product',[productcontroller::class,'index']);
Route::get('porduct/edit/{id}',[productcontroller::class,'edit']);
Route::post('porduct/update/{id}',[productcontroller::class,'update']);
Route::get('porduct/create',[productcontroller::class,'create']);
Route::delete('porduct/delete/{id}',[productcontroller::class,'delete']);
Route::post('porduct/store',[productcontroller::class,'store']);
Route::get('index',[BookController::class,'index']);
Route::get('book/{id}',[BookController::class,'show']);
Route::get('index/category/{category_id}',[BookController::class,'getByCategory']);
Route::get('index/title/{title}',[BookController::class,'getByTitle']);
Route::get('index/author/{author}',[BookController::class,'getByAuthor']);
Route::get('userPurchased',[PurchaseController::class,'getUsersPurchased']);
Route::get('userFavouriteBooks/{id}',[\App\Http\Controllers\Api\FavoriteBooksController::class,'getUserFavouriteBooks'])->middleware('auth:sanctum');;
Route::post('AddCommentsToBook',[\App\Http\Controllers\Api\BookRatesController::class,'store'])->middleware('auth:sanctum');
Route::post('purchaseBook',[\App\Http\Controllers\Api\PurchaseController::class,'store'])->middleware('auth:sanctum');
