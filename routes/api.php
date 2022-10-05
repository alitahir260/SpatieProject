<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function(){
    
    Route::get('data/{id?}',[dummyAPI::class,'show']);

    Route::post('store',[dummyAPI::class,'create']);
    
    Route::put('update',[dummyAPI::class,'update']);
    
    Route::get('search/{name}',[dummyAPI::class,'search']);
    
    Route::delete('delete/{id}',[dummyAPI::class,'delete']);

});



Route::post("login",[UserController::class,'index']);
