<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//protected routes
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get("/users", [AuthController::class, 'index']);
    Route::controller(EventController::class)->group(function(){
        Route::get('/events', 'index');
        Route::get('/events/event', 'show');
        Route::post('/events/create', 'store');
        Route::put('/events/update', 'update');
        Route::delete('/events/delete', 'destroy');
    });
    Route::controller(AvailabilityController::class)->group(function(){
        Route::get('/availabilities', 'index');
        Route::get('/availabilities/availability', 'show');
        Route::post('/availabilities/create', 'store');
        Route::put('/availabilities/update', 'update');
        Route::put('/availabilities/event', 'assignEvent');
        Route::delete('/availabilities/delete', 'destroy');
    });
});
