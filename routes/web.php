<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;

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


Route::middleware('auth')->group(function (){
    Route::resource('devices', DeviceController::class);

    Route::controller(DeviceController::class)->group(function(){
        Route::get('/', 'index');
        Route::delete('devices/force/{device}', 'forceDestroy')->name('devices.force.destroy');
        Route::put('devices/restore/{device}','restore')->name('devices.restore');
    });

    Route::resource('cards', CardController::class);
    Route::controller(CardController::class)->group(function(){
        Route::delete('cards/force/{card}', 'forceDestroy')->name('cards.force.destroy');
        Route::put('cards/restore/{card}', 'restore')->name('cards.restore');
    });

    Route::resource('users', UserController::class);
    Route::controller(UserController::class)->group(function() {
        Route::put('users/restore/{user}', 'restore')->name('users.restore');
    });
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});
