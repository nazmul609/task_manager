<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\task_controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [task_controller::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [task_controller::class, 'create'])->name('tasks.create');
Route::post('/tasks', [task_controller::class, 'store'])->name('tasks.store');

Route::get('/tasks/{task}', [task_controller::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [task_controller::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [task_controller::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{task}/complete', [task_controller::class, 'complete'])->name('tasks.complete');
Route::get('/taskshow', [task_controller::class, 'showCompleted'])->name('taskshow');
