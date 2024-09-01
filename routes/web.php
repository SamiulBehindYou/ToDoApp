<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToDoController::class, 'dashboard'])->name('dashboard');
Route::get('create', [ToDoController::class, 'create'])->name('create');
Route::post('/create_id', [ToDoController::class, 'create_id'])->name('create_id');
Route::post('/create_todo', [ToDoController::class, 'create_todo'])->name('create_todo');
Route::post('/view_todo', [ToDoController::class, 'view_todo'])->name('view_todo');
Route::get('/make_done/{id}', [ToDoController::class, 'make_done'])->name('make_done');
Route::get('/send_to_trash/{id}', [ToDoController::class, 'send_to_trash'])->name('send_to_trash');
Route::get('/delete_todo/{id}', [ToDoController::class, 'delete_todo'])->name('delete_todo');
