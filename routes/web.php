<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Payment\ManualController;
use App\Http\Controllers\Auth\LoginController;

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
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['web', 'auth'],'prefix' => 'admin','as'=>'admin.'], function () {

    Route::get('dashboard',[DashboardController::class,'getCount'])->name('dashboard');

    Route::resource('customer',CustomerController::class);
    Route::put('customer-changeState/{customer}',[CustomerController::class,'changeState'])->name('customer.changeState');
    Route::get('customer-get-nrc-townships', [CustomerController::class, 'getNrcTownships'])->name('customer.getNrcTownships');
    Route::get('customer-get-rest-rooms-people', [CustomerController::class, 'getRestRoomsByPeople'])->name('customer.getRestRoomsByPeople');
    Route::get('customer-get-rest-rooms', [CustomerController::class, 'getRestRooms'])->name('customer.getRestRooms');
    Route::post('customer-payment/{customer}',[ManualController::class,'make'])->name('payment.make');

    Route::get('logout',[LoginController::class,'logout']);

    //Only Admin user view
    Route::group(['middleware' => ['admin']], function () {
        Route::resources([
            'room' => RoomController::class,
            'room-type' => RoomTypeController::class,
            'room-service' => RoomServiceController::class,
            'user' => UserController::class
        ]);
    
        Route::get('report',[ReportController::class,'report'])->name('report');    
    });
});

