<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

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
    return view('home');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::post('/search', [HotelController::class,'searchHotel'])->name('hotel.search');
Route::get('/listings', [HotelController::class,'allHotels'])->name('hotel.list');
Route::get('/hotel/view/{id}', [HotelController::class, 'show'])->name('hotel.show');
Route::get('/hotel/reservation/{id}', [HotelController::class, 'reservationView'])->name('reservation.home');
Route::post('hotel/reserve/{id}', [HotelController::class, 'makeReservation'])->name('reservation.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
