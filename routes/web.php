<?php

use App\Http\Controllers\EventController;
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

Route::get('/', [EventController::class, 'home'])->name('home');

Route::get('/get-events', [EventController::class, 'getEvents'])->name('get.events');

Route::post('/save-events', [EventController::class, 'store'])->name('save.events');
