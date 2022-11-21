<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

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
    return view('index');
});


Route::get('/index', [IndexController::class, 'index']);


// Vistas
Route::view('/index', "index")->name('index');
Route::view('/login', "login")->name('login');
Route::view('/validacion', "validacion")->name('validacion');
Route::view('/usuarios', "usuarios")->name('usuarios');
Route::view('/register', "register")->name('register');

// Login y registro

Route::post('/inicia-sesion', [UserController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// ESTUDIANTE
Route::get('/estudiante', [AlumnoController::class, "datosestudiantes"])->name('estudiante');
Route::view('/alumnos', "alumnos")->name('alumnos');

Route::get('/alumnos', [AlumnoController::class, "index"])->name('alumnos.index');
Route::post('/createalum', [AlumnoController::class, "store"])->name('crearalumno');
Route::post('/buscaralumno', [AlumnoController::class, "buscar"])->name('buscaralumno');

Route::delete('alumno/{alumno}/eliminar', [AlumnoController::class, "destroy"])->name('alumno.delete');
Route::get('detalles-alum/{alum}', [AlumnoController::class, "detalles"])->name('alumnos.detalles');
Route::get('actualizar-alum/{alum}', [AlumnoController::class, "edit"])->name('alumnos.edit');
Route::put('actualizar/{alumno}', [AlumnoController::class, "update"])->name('editaralumno');

// CERTIFICADOS
Route::post('/crearcertificado', [AlumnoController::class, "crear_certificado"])->name('crearcertificado');
Route::put('actualizar-cer/{cer}', [AlumnoController::class, "actualizar_certificado"])->name('actualizarcertificado');


// USUARIOS
Route::get('/usuarios', [UserController::class, "index"])->name('usuarios.index');
Route::post('/validar-registro', [UserController::class, 'register'])->name('validar-registro');
Route::delete('usuario/{user}/eliminar', [UserController::class, "destroy"])->name('usuario.delete');
Route::put('actualizar-usuario', [UserController::class, "editaruser"])->name('editaruser');

// BUSCADOR
Route::get('/search2', [AlumnoController::class, "buscaralumno2"])->name('buscaralumno2');
Route::get('/search3/{buscar}', [AlumnoController::class, "buscaralumno3"])->name('buscaralumno3');



// administrador
Route::view('/admin', "admin")->name('admin');
