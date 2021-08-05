<?php
use App\Http\Controllers\profilsController;
use App\Http\Controllers\pengalamansController;
use App\Http\Controllers\hubungisController;
use App\Http\Controllers\historysController;

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

Route::get('',[profilsController::class, 'index']);
//Route::get('/hubungis', [profilController::class, 'index']);
//Route::get('/hubungis/create', [profilController::class, 'create']);
//Route::post('/hubungis', [profilController::class, 'store']);
//Route::get('/hubungis/{id}', [profilController::class,'show']);
//Route::get('/hubungis/{id}/edit', [profilController::class,'edit']);
//Route::put('/hubungis/{id}', [profilController::class,'update']);
//Route::delete('/hubungis/{id}', [profilController::class,'destroy']);

Route::resources([
    'profils' => profilsController::class,
    'hubungis' => hubungisController::class,
    'pengalamans' => pengalamansController::class,
    'historys' => historysController::class,
]);
