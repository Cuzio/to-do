<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/todo', [TodoController::class, 'todo'])->name('todo');

Route::post('/createTodo', [TodoController::class, 'createTodo']);

Route::get('/', [TodoController::class, 'getEvents'])->name("get.events");

Route::get('editTodo/{post_id}', [TodoController::class, 'editTodo'])->name('edit.todo');

Route::post('updateTodo/{post_id}', [TodoController::class, 'updateTodo'])->name('update.todo');