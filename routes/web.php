<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutas para el admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para el admin - usuarios
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}',[UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::get('/admin/usuarios/{id}/confirm-delete', [UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->Middleware('auth');
Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuario.destroy')->middleware('auth');

//Rutas para el admin - usuarios
Route::get('/admin/secretarias', [SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth');
Route::get('/admin/secretarias/create', [SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth');
Route::post('/admin/secretarias/create', [SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth');
Route::get('/admin/secretarias/{id}', [SecretariaController::class, 'show'])->name('admin.secretaria.show')->middleware('auth');
Route::get('/admin/secretarias/{id}/edit', [SecretariaController::class, 'edit'])->name('admin.secretaria.edit')->middleware('auth');
Route::put('/admin/secretarias/{id}', [SecretariaController::class, 'update'])->name('admin.secretaria.update')->middleware('auth');
Route::get('/admin/secretarias/{id}/confirm-delete', [SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware('auth');
Route::delete('/admin/secretarias/{id}', [SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth');
