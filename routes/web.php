<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\MasterEventController;


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
Route::resource('events', MasterEventController::class); // Route untuk tabel event
Route::resource('organizers', OrganizerController::class);
Route::resource('event_categories', EventCategoryController::class);