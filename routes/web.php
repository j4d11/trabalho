<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilsController;
use App\Http\Controllers\UsersController;
use App\Models\User;

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
//Rota de Usuarios
Route::get('/users', [UsersController::class, 'index'])->name('index');
Route::get('/users/create', [UsersController::class, 'create'])->name('create');
Route::post('/users/store', [UsersController::class, 'store'])->name('store');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('update');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('destroy');

//Rota de Perfils


Route::get('/', function () {
    return view('welcome');
});
