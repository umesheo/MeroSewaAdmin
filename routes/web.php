<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('worker', [\App\Http\Controllers\Firebase\WorkerController::class, 'index'])->middleware('auth');
Route::post('add-worker', [\App\Http\Controllers\Firebase\WorkerController::class, 'store'])->middleware('auth');
Route::get('edit-worker/{id}', [\App\Http\Controllers\Firebase\WorkerController::class, 'edit'])->middleware('auth');
Route::put('update-worker/{id}', [\App\Http\Controllers\Firebase\WorkerController::class, 'update'])->middleware('auth');
Route::get('delete-worker/{id}', [\App\Http\Controllers\Firebase\WorkerController::class, 'destroy'])->middleware('auth');
Route::get('user', [\App\Http\Controllers\Firebase\WorkerController::class, 'user'])->middleware('auth');
Route::get('paginate', [\App\Http\Controllers\Firebase\WorkerController::class, 'index'])->middleware('auth');
Route::get('paginateUser', [\App\Http\Controllers\Firebase\WorkerController::class, 'user'])->middleware('auth');

Route::get('/test', function () {


});
