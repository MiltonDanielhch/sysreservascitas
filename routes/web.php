<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index'])->name('index');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutas para el admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para el admin - usuarios
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth', 'can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth', 'can:admin.usuarios.create');
Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth', 'can:admin.usuarios.store');
Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth', 'can:admin.usuarios.show');
Route::get('/admin/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth', 'can:admin.usuarios.edit');
Route::put('/admin/usuarios/{id}',[UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth', 'can:admin.usuarios.update');
Route::get('/admin/usuarios/{id}/confirm-delete', [UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->Middleware('auth', 'can:admin.usuarios.confirmDelete');
Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuario.destroy')->middleware('auth', 'can:admin.usuario.destroy');

//Rutas para el admin - usuarios
Route::get('/admin/secretarias', [SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth', 'can:admin.secretarias.index');
Route::get('/admin/secretarias/create', [SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth', 'can:admin.secretarias.create');
Route::post('/admin/secretarias/create', [SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth', 'can:admin.secretarias.store');
Route::get('/admin/secretarias/{id}', [SecretariaController::class, 'show'])->name('admin.secretaria.show')->middleware('auth', 'can:admin.secretaria.show');
Route::get('/admin/secretarias/{id}/edit', [SecretariaController::class, 'edit'])->name('admin.secretaria.edit')->middleware('auth', 'can:admin.secretaria.edit');
Route::put('/admin/secretarias/{id}', [SecretariaController::class, 'update'])->name('admin.secretaria.update')->middleware('auth', 'can:admin.secretaria.update');
Route::get('/admin/secretarias/{id}/confirm-delete', [SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware('auth', 'can:admin.secretarias.confirmDelete');
Route::delete('/admin/secretarias/{id}', [SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth', 'can:admin.secretarias.destroy');

//Rutas para el admin - Pacientes
Route::get('/admin/pacientes', [PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware('auth', 'can:admin.pacientes.index');
Route::get('/admin/pacientes/create', [PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware('auth', 'can:admin.pacientes.create');
Route::post('/admin/pacientes/create', [PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware('auth', 'can:admin.pacientes.store');
Route::get('/admin/pacientes/{id}', [PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware('auth', 'can:admin.pacientes.show');
Route::get('/admin/pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth', 'can:admin.pacientes.edit');
Route::put('/admin/pacientes/{id}', [PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware('auth', 'can:admin.pacientes.update');
Route::get('/admin/pacientes/{id}/confirm-delete', [PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware('auth', 'can:admin.pacientes.confirmDelete');
Route::delete('/admin/pacientes/{id}', [PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth', 'can:admin.pacientes.destroy');

//Rutas para el admin - Consultorios
Route::get('/admin/consultorios', [ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware('auth', 'can:admin.consultorios.index');
Route::get('/admin/consultorios/create', [ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware('auth','can:admin.consultorios.create');
Route::post('/admin/consultorios/create', [ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware('auth','can:dmin.consultorios.store');
Route::get('/admin/consultorios/{id}', [ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware('auth', 'can:admin.consultorios.show');
Route::get('/admin/consultorios/{id}/edit', [ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware('auth', 'can:admin.consultorios.edit');
Route::put('/admin/consultorios/{id}', [ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware('auth', 'can:admin.consultorios.update');
Route::get('/admin/consultorios/{id}/confirm-delete', [ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->middleware('auth', 'can:dmin.consultorios.confirmDelete');
Route::delete('/admin/consultorios/{id}', [ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware('auth', 'can:admin.consultorios.destroy');

//Rutas para el admin - doctores
Route::get('/admin/doctores', [DoctorController::class, 'index'])->name('admin.doctores.index')->middleware('auth', 'can:admin.doctores.index');
Route::get('/admin/doctores/create', [DoctorController::class, 'create'])->name('admin.doctores.create')->middleware('auth', 'can:admin.doctores.create');
Route::post('/admin/doctores/create', [DoctorController::class, 'store'])->name('admin.doctores.store')->middleware('auth', 'can:admin.doctores.store');
Route::get('/admin/doctores/{id}', [DoctorController::class, 'show'])->name('admin.doctores.show')->middleware('auth', 'can:admin.doctores.show');
Route::get('/admin/doctores/{id}/edit', [DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware('auth', 'can:admin.doctores.edit');
Route::put('/admin/doctores/{id}', [DoctorController::class, 'update'])->name('admin.doctores.update')->middleware('auth', 'can:admin.doctores.update');
Route::get('/admin/doctores/{id}/confirm-delete', [DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')->middleware('auth', 'can:admin.doctores.confirmDelete');
Route::delete('/admin/doctores/{id}', [DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware('auth', 'can:admin.doctores.destroy');


//Rutas para el admin - horarios
Route::get('/admin/horarios', [HorarioController::class, 'index'])->name('admin.horarios.index')->middleware('auth', 'can:admin.horarios.index');
Route::get('/admin/horarios/create', [HorarioController::class, 'create'])->name('admin.horarios.create')->middleware('auth', 'can:admin.horarios.create');
Route::post('/admin/horarios/create', [HorarioController::class, 'store'])->name('admin.horarios.store')->middleware('auth', 'can:admin.horarios.store');
Route::get('/admin/horarios/{id}', [HorarioController::class, 'show'])->name('admin.horarios.show')->middleware('auth','can:admin.horarios.show');
Route::get('/admin/horarios/{id}/edit', [HorarioController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth', 'can:admin.horarios.edit');
Route::put('/admin/horarios/{id}', [HorarioController::class, 'update'])->name('admin.horarios.update')->middleware('auth', 'can:admin.horarios.update');
Route::get('/admin/horarios/{id}/confirm-delete', [HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')->middleware('auth', 'can:admin.horarios.confirmDelete');
Route::delete('/admin/horarios/{id}', [HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth', 'can:admin.horarios.destroy');

//ajax
Route::get('/admin/horarios/consultorios/{id}', [HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consutorios')->middleware('auth', 'can:cargar_datos_consultorios');


///Rutas para el usuario
//ajax
Route::get('/consultorios/{id}', [WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios')->middleware('auth', 'can:cargar_datos_consultorios');
Route::get('/cargar_reserva_doctores/{id}', [WebController::class, 'cargar_reserva_doctores'])->name('cargar_reserva_doctores')->middleware('auth', 'can:cargar_reserva_doctores');
Route::get('/admin/ver_reservas/{id}', [AdminController::class, 'ver_reservas'])->name('ver_reservas')->middleware('auth', 'can:ver_reservas');
Route::post('/admin/eventos/create', [EventController::class, 'store'])->name('admin.eventos.create')->middleware('auth', 'can:admin.eventos.create');
Route::delete('/admin/eventos/destroy/{id}', [EventController::class, 'destroy'])->name('admin.eventos.destroy')->middleware('auth', 'can:admin.eventos.destroy');
