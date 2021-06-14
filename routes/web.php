<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentAndBookingController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TerminalController;

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

Route::get('', [ClientController::class, 'index'])->name('home');
Route::post('/select_schedule', [ClientController::class, 'select_schedule'])->name('select_schedule');
Route::post('/preview_booking', [ClientController::class, 'preview_booking'])->name('preview_booking');
Route::post('/payment', [ClientController::class, 'payment'])->name('payment');
Route::post('/book_me', [ClientController::class, 'book_me'])->name('book_me');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/payments', [PaymentAndBookingController::class, 'payments'])->name('payments');
Route::get('/bookings', [PaymentAndBookingController::class, 'bookings'])->name('bookings');

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');
Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'store']);
Route::post('/auth/logout', [LogoutController::class, 'logout_user'])->name('logout');

Route::get('/user_payments', [PaymentAndBookingController::class, 'user_payments'])->name('user_payments');
Route::get('/user_bookings', [PaymentAndBookingController::class, 'user_bookings'])->name('user_bookings');


// Bus
Route::get('/bus', [BusController::class, 'index'])->name('bus');
Route::get('/bus/create_update_bus', [BusController::class, 'bus_form'])->name('store');
Route::post('/bus/create_update_bus', [BusController::class, 'store']);
Route::get('/bus/update_form/{bus:name}', [BusController::class, 'update_form'])->name('update_bus');
Route::post('/bus/delete', [BusController::class, 'delete_bus'])->name('delete_bus');

// Terminal
Route::get('/terminal', [TerminalController::class, 'index'])->name('terminal');
Route::get('/terminal/create_update_terminal', [TerminalController::class, 'terminal_form'])->name('store_terminal');
Route::post('/terminal/create_update_terminal', [TerminalController::class, 'store']);
Route::get('/terminal/update_form/{terminal:name}', [TerminalController::class, 'update_form'])->name('update_terminal');
Route::post('/terminal/delete', [TerminalController::class, 'delete_terminal'])->name('delete_terminal');

// Schedule
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
Route::get('/schedule/create_update_schedule', [ScheduleController::class, 'schedule_form'])->name('store_schedule');
Route::post('/schedule/create_update_schedule', [ScheduleController::class, 'store']);
Route::get('/schedule/update_form/{schedule:id}', [ScheduleController::class, 'update_form'])->name('update_schedule');
Route::post('/schedule/delete', [ScheduleController::class, 'delete_schedule'])->name('delete_schedule');
