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
Route::post('/classrooms', [classroomsController::class, 'store'])->name('classrooms.store');

Route::get('/classrooms/{classroom}', [classroomsController::class, 'show'])->name('classrooms.show')
    ->where('classrooms', '/d+');

Route::get('/classrooms/{classroom}/edit', [classroomsController::class, 'edit'])
    ->name('classrooms.edit')
    ->where('classrooms', '/d+');

Route::put('/classrooms/{classroom}', [classroomsController::class, 'update'])
    ->name('classrooms.update')
    ->where('classrooms', '/d+');

Route::delete('/classrooms/{classroom}', [classroomsController::class, 'destroy'])
    ->name('classrooms.destroy')
    ->where('classrooms', '/d+');
