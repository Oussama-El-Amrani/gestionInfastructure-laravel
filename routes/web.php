<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\DeviceController;
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



Route::resource('devices', DeviceController::class);

Route::controller(DeviceController::class)->group(function(){
    Route::get('/','index');
    Route::delete('devices/force/{device}', 'forceDestroy')->name('devices.force.destroy');
    Route::put('devices/restore/{device}','restore')->name('devices.restore');
});

Route::resource('cards', CardController::class);
Route::controller(CardController::class)->group(function(){
    Route::delete('cards/force/{card}', 'forceDestroy')->name('cards.force.destroy');
    Route::put('cards/restore/{card}', 'restore')->name('cards.restore');
    Route::get('user/{pseudo}/card', 'index')->name('cards.user');
});