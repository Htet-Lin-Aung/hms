<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomServiceController;
use App\Http\Controllers\CustomerController;

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

Route::prefix('admin')->as('admin.')->group(function () {
    Route::resources([
        'room' => RoomController::class,
        'room-type' => RoomTypeController::class,
        'room-service' => RoomServiceController::class,
        'customer' => CustomerController::class,
    ]);

    Route::put('customer-changeState/{customer}',[CustomerController::class,'changeState'])->name('customer.changeState');
});
