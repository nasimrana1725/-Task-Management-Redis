<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
//Auth::routes();
//
//Route::redirect('/', 'home', 301);
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::get('/required_data', [App\Http\Controllers\TaskController::class, 'required_data'])->name('required_data');
//    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//
////    Auth::routes();
//    Route::get('/admin/{any}', function () {
//        return view('app');
//    })->where('any', '.*')->middleware('auth');
//});
//
//Route::prefix('api')->group(function () {
//    Route::resource('task',App\Http\Controllers\TaskController::class)->only(['index','store','show','update','destroy']);
//});

Auth::routes();
Route::redirect('/', 'home', 301);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/required_data', [App\Http\Controllers\TaskController::class, 'required_data'])->name('required_data');
    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    //    Auth::routes();
    Route::get('/admin/{any}', function () {
        return view('app');
    })->where('any', '.*')->middleware('auth');
});

Route::prefix('api')->group(function () {
    Route::resource('task', App\Http\Controllers\TaskController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
});



