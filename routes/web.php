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
    return view('welcome');
});


Route::get('/index', [IndexController::class, 'index']);


// Route::get('/index', function () {
//     return view('index');
// });

// Route::get('/validacion', function () {
//     return view('validacion');
// });

// Route::get('/admin', function () {
//     return view('usuarios');
// });

// Route::get('/certificado', function () {
//     return view('certificados');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Vistas
Route::view('/index', "index")->name('index');
Route::view('/login', "login")->name('login');
Route::view('/validacion', "validacion")->name('validacion');
Route::view('/usuarios', "usuarios")->name('usuarios');
Route::view('/register', "register")->name('register');

// Login y registro
Route::post('/validar-registro', [UserController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [UserController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// ESTUDIANTE
Route::view('/estudiante', "estudiante")->name('estudiante');
Route::view('/alumnos', "alumnos")->name('alumnos');

Route::get('/alumnos', [AlumnoController::class, "index"])->name('alumnos.index');
Route::post('/createalum', [AlumnoController::class, "store"])->name('crearalumno');
Route::post('/buscaralumno', [AlumnoController::class, "buscar"])->name('buscaralumno');

Route::delete('alumno/{alumno}/eliminar', [AlumnoController::class, "destroy"])->name('alumno.delete');



// administrador
Route::view('/admin', "admin")->name('admin');
