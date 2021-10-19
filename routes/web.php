<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\WorkerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('worker',[\App\Http\Controllers\Firebase\WorkerController::class,'index'])->middleware('auth');
Route::post('add-worker',[\App\Http\Controllers\Firebase\WorkerController::class,'store'])->middleware('auth');;
