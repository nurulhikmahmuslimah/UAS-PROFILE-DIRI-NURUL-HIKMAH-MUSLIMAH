<?php

use App\Http\Controllers\Api\profilsController;
use App\Http\Controllers\Api\pengalamansController;
use App\Http\Controllers\Api\hubungisController;
use App\Http\Controllers\Api\hitorysController;
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

Route::get('',[profilsController::class, 'index']);
Route::resources([
    'profils' => profilsController::class,
    'pengalamans' => pengalamansController::class,
    'hubungis' => hubungisController::class,
    'historys' => historysController::class,
]);