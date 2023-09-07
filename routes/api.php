<?php

use App\Http\Controllers\MainController;
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

Route::get('get_paint_colors', [MainController::class, 'getPaintColors']);
Route::get('get_film_colors', [MainController::class, 'getFilmColors']);
Route::get('get_handle_colors', [MainController::class, 'getHandleColors']);
Route::get('get_widths', [MainController::class, 'getWidths']);
Route::get('get_heights', [MainController::class, 'getHeights']);
Route::get('get_opening', [MainController::class, 'getOpening']);
Route::post('create_product', [MainController::class, 'createProduct']);
