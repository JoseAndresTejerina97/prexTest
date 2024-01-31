<?php

use App\Src\Giphy\Infrastructure\Controller\GifController;
use Illuminate\Support\Facades\Route;
use App\Src\Giphy\Infrastructure\Controller\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/login',function(){
    return response("No tiene autorización",503);
})->name("login");
Route::post('login', [ApiAuthController::class,'login']);
Route::post('register', 'AuthController@register');
Route::middleware('auth:api')->group(function () {
    Route::get('gif/search',[GifController::class,'findByName'])->name("gif.search");
    Route::get('gif/{id}',[GifController::class,'findById'])->name("gif.findById");
    Route::post('gif/favorite',[GifController::class,'setFavorite'])->name("gif.favorite");

});
