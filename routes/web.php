<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('todos', [Controllers\TodosController::class, 'index']);

Route::get('todos/{todo}', [Controllers\TodosController::class, 'show']);

Route::get('new-todo', [Controllers\TodosController::class, 'new']);

Route::post('create-todo', [Controllers\TodosController::class, 'create']);

Route::get('todos/{todo}/edit', [Controllers\TodosController::class, 'edit']);

Route::post('todos/{todo}/update-todo', [Controllers\TodosController::class, 'update']);
