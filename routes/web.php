<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;



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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//<--admin controleers-->
route::get('/home', [AdminController::class, 'index']);
route::get('/events_management', [AdminController::class, 'events_management']);
route::post('/add_event', [AdminController::class, 'add_event']);
route::get('/crud_events', [AdminController::class, 'crud_events']);
route::get('/event_delete/{id}', [AdminController::class, 'event_delete']);
route::get('/edit_event/{id}', [AdminController::class, 'edit_event']);
route::post('/update_event/{id}', [AdminController::class, 'update_event']);


//<--home controllers-->
route::get('/', [HomeController::class, 'index']);
route::get('/event_details/{id}', [HomeController::class, 'event_details']);
route::get('/reserve_ticket/{id}', [HomeController::class, 'reserve_ticket']);
route::get('/reserve_history', [HomeController::class, 'reserve_history']);
route::get('/explore', [HomeController::class, 'explore']);
route::get('/search', [HomeController::class, 'search']);