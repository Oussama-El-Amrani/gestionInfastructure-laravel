<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('devices', DeviceController::class);

Route::controller(DeviceController::class)->group(function(){
    Route::delete('devices/force/{device}', 'forceDestroy')->name('devices.force.destroy');
    Route::put('devices/restore/{device}')->name('devices.restore');
    Route::get('user/{pseudo}/device', 'index')->name('devices.user');
});