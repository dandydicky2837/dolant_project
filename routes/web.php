<?php

use Illuminate\Support\Facades\Route;


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
    if (Auth::check()){
        return redirect('/home');
    }
    else {
        return redirect('/login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::get('/create', function () {
    return view('create');
});

Route::post('/create/add', [App\Http\Controllers\TaskController::class, 'store'])->middleware('auth:sanctum');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/task/acc/{id}', [App\Http\Controllers\TaskController::class, 'validasi'])->middleware('auth:sanctum'); 

Route::delete('/task/{id}',[App\Http\Controllers\TaskController::class, 'destroy']);


