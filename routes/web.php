<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EventController::class, 'index'])->name('events.card'); // Route untuk card event
Route::get('/events', [EventController::class, 'indexMaster'])->name('events.table'); // Route untuk tabel event
Route::resource('events', EventController::class); 
Route::resource('organizers', OrganizerController::class);
Route::resource('event_categories', EventCategoryController::class);