<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReloadActivityController;
use App\Http\Controllers\NewActivityController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/activity', [ActivityController::class, 'index']) -> name('activity.index');
Route::get('/reloadactivity', [ActivityController::class, 'reload']) -> name('activity2.reload');

Route::get('/newactivity', [ActivityController::class, 'newpage'])-> name('activity.add');
Route::post('/newactivity',[ActivityController::class, 'add']) -> name('newactivity.add');
Route::resource('/editactivity',ActivityController::class);
Route::resource('/deleteactivity',NewActivityController::class);
Route::get('/activiti', [ReloadActivityController::class, 'index']) -> name('reload.index');
