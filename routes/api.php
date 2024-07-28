<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APINews;
use App\Http\Controllers\API\APIRecommendations;
use App\Http\Controllers\API\APISubscribe;
use App\Http\Controllers\API\APITermsAndConditions;
use App\Http\Controllers\API\Authentication;

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


Route::post('/register' , [Authentication::class,'register']);
Route::post('/login' , [Authentication::class,'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// public route
Route::get('/news', [APINews::class, 'news'])->name('news.api.index');
Route::get('/terms/conditions', [APITermsAndConditions::class, 'termsAndConditions'])->name('api.termsAndConditions');


// private routes
Route::group(['middleware'=>['auth:sanctum']] , function() {
Route::get('/recommendations/{uuid}', [APIRecommendations::class, 'recommendations'])->name('recommendations.api.index');
Route::post('/subscribe-user', [APISubscribe::class, 'subscribe'])->name('subscribe.api');
Route::post('/logout' , [Authentication::class,'logout']);
Route::post('/change/password' , [Authentication::class,'changePassword']);

Route::get('/me', [APIRecommendations::class, 'me'])->name('api.me');

});


