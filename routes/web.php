<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\RecommendationsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Auth::routes();

// users routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/users', [HomeController::class, 'users'])->name('users.index');
Route::get('/users/create', [HomeController::class, 'create'])->name('users.create');
Route::post('/users/store', [HomeController::class, 'store'])->name('users.store');
Route::get('/users/edit/{uuid}', [HomeController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{uuid}', [HomeController::class, 'update'])->name('users.update');






Route::get('/subscribe/{uuid}', [HomeController::class, 'subscribe'])->name('subscribe');
Route::put('/unsubscribe/{uuid}', [HomeController::class, 'unsubscribe'])->name('unsubscribe');

Route::get('/users/registered-users', [HomeController::class, 'registeredUsers'])->name('users.registeredUsers');
Route::get('/users/free/registered-users', [HomeController::class, 'freeDaysUsers'])->name('users.freeDaysUsers');
Route::get('/users/non-free/registered-users', [HomeController::class, 'nonFreeDaysUsers'])->name('users.nonFreeDaysUsers');

Route::put('/users/registere/freedays/{uuid}', [HomeController::class, 'registerFreeDays'])->name('registerFreeDays');
Route::put('/users/registere/{uuid}', [HomeController::class, 'registerUser'])->name('registerUser');


// main landing page
Route::get('/main', [LandingController::class, 'index'])->name('main');



// admin routes

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

// news routes
Route::get('/admin-cp/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/admin-cp/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/admin-cp/news/store', [NewsController::class, 'store'])->name('news.store');
Route::get('/admin-cp/news/edit/{uuid}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/admin-cp/news/update/{uuid}', [NewsController::class, 'update'])->name('news.update');


// recommendations routes
Route::get('/admin-cp/recommendations', [RecommendationsController::class, 'index'])->name('recommendations.index');
Route::get('/admin-cp/recommendations/create', [RecommendationsController::class, 'create'])->name('recommendations.create');
Route::post('/admin-cp/recommendations/store', [RecommendationsController::class, 'store'])->name('recommendations.store');
Route::get('/admin-cp/recommendations/edit/{uuid}', [RecommendationsController::class, 'edit'])->name('recommendations.edit');
Route::put('/admin-cp/recommendations/update/{uuid}', [RecommendationsController::class, 'update'])->name('recommendations.update');

// options routes
Route::get('/admin-cp/options', [OptionsController::class, 'index'])->name('options.index');
Route::get('/admin-cp/options/create', [OptionsController::class, 'create'])->name('options.create');
Route::post('/admin-cp/options/store', [OptionsController::class, 'store'])->name('options.store');
Route::get('/admin-cp/options/edit/{id}', [OptionsController::class, 'edit'])->name('options.edit');
Route::put('/admin-cp/options/update/{id}', [OptionsController::class, 'update'])->name('options.update');
Route::delete('/admin-cp/options/delete/{id}', [OptionsController::class, 'destroy'])->name('options.destroy');
