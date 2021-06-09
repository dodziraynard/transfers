<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BusController;

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

Route::get('/', function () {return view('index');});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');

Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'store']);
Route::post('/auth/logout', [LogoutController::class, 'logout_user'])->name('logout');


Route::get('/bus', [BusController::class, 'index'])->name('bus');
Route::get('/bus/create_update_bus', [BusController::class, 'bus_form'])->name('store');
Route::post('/bus/create_update_bus', [BusController::class, 'store']);
Route::get('/bus/update_form/{bus:name}', [BusController::class, 'update_form'])->name('update_bus');
Route::post('/bus/delete', [BusController::class, 'delete_bus'])->name('delete_bus');
