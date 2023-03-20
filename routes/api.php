<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProjectionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SpectatorController;
use App\Http\Controllers\TicketController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    '/movie' => MovieController::class,
    '/room' => RoomController::class,
    '/spectator' => SpectatorController::class,
    '/ticket' => TicketController::class
]);

Route::post('/projection', [ProjectionController::class, 'createProjection']);
Route::get('/projection', [ProjectionController::class, 'getProjections']);


Route::get('api/ticket', [TicketController::class, 'index']);
Route::post('api/ticket', [TicketController::class, 'store']);
Route::post('/mostWatched', [TicketController::class, 'mostWatched']);
Route::post('/occupancy', [TicketController::class, 'occupancyList']);
Route::get('/home', [HomeController::class, 'index']);
