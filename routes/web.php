<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayStationController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', function (){
    return view('welcome');
});

Route::get('/error404', function (){
    return view('error404');
})->name('error');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard',
        [ZoneController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/show',
        [ZoneController::class, 'show'])->name('dashboard.show');

    Route::get('/dashboard/show/{id}',
        [PlayStationController::class, 'show_ps'])->name('showps');

    Route::get('/profile',
        [UserController::class, 'show'])->name('profile');

    Route::put('/profile/update',
        [UserController::class, 'update'])->name('profile.update');

    Route::get('/createbuss',
        [PlayStationController::class, 'index'])->name('createbuss');

    Route::post('/createbuss/store',
        [PlayStationController::class, 'store'])->name('createbuss.store');

    Route::post('/createresv/{id}',
        [ReservationController::class, 'store'])->name('createresv.store');

    Route::get('/showresvs',
        [ReservationController::class, 'index'])->name('showresvs');

    Route::put('/showresvs/{id}/{status}',
        [ReservationController::class, 'update'])->name('showresvs.update');

    Route::get('/bussinessinfo',
        [UserController::class, 'index'])->name('bussinessinfo');

    Route::get('/bussprofile/{id}',
        [PlayStationController::class, 'show_buss'])->name('bussprofile');

    Route::put('/bussprofile/{id}/update',
        [PlayStationController::class, 'update'])->name('bussupdate');

    Route::delete('/bussprofile/{id}/delete',
        [PlayStationController::class, 'destroy'])->name('bussdelete');

});

require __DIR__.'/auth.php';
