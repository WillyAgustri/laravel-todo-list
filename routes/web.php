<?php

use App\Http\Controllers\TodoController;
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

// Route::get('/', function () {
//     return view('home.todo');
// });

Route::get('/home', [TodoController::class, 'index'])->name('home');
Route::post('/home', [TodoController::class, 'store'])->name('store');
Route::patch('/home/{id}', [TodoController::class, 'update'])->name('update');
Route::get('/home/{id}', [TodoController::class, 'getData'])->name('getData');
Route::delete('/home/{id}', [TodoController::class, 'destroy'])->name('destroy');

// Route::delete('/{todo:id}', TodoController::class, 'destroy'->name('destroy'));