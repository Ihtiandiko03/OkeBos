<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ControllerFormPengiriman;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\KurirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RuteController;
use App\Models\User;
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
    return view('index');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/profil', DashboardUserController::class)->middleware('auth');
Route::resource('/dashboard/pengiriman', ControllerFormPengiriman::class)->middleware('auth');

Route::get('/dashboard/admin/driver', [AdminController::class, 'driver'])->middleware('admin');
Route::get('/dashboard/admin/pengiriman', [AdminController::class, 'pengiriman'])->middleware('admin');
Route::resource('/dashboard/admin', AdminController::class)->middleware('admin');
Route::resource('/dashboard/rute', RuteController::class)->middleware('admin');

Route::resource('/dashboard/kurir', KurirController::class)->middleware('kurir');
