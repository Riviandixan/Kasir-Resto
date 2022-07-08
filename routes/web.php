<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Models\User;
use App\Models\Menu;
use App\Models\Transaksi;


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

// login
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'authanticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// admin
Route::prefix('admin')->group(function() {
    Route::resource('admin', UserController::class);
});

// manajer
Route::prefix('manajer')->group(function(){
    Route::resource('menu', MenuController::class);
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/cetak', [LaporanController::class, 'cetak'])->name('cetak');

});

// kasir
Route::prefix('kasir')->group(function(){
    Route::resource('transaksi', TransaksiController::class);
});
