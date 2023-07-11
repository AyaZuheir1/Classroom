<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\classroomsController;

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

Route::get('/classrooms', [classroomsController::class, 'index'])->name('classrooms.index');
Route::get('/classrooms/create', [classroomsController::class, 'create'])->name('classrooms.create');
Route::get('/edit/{id?}', [EditController::class, 'index'])->name('edit.index');
