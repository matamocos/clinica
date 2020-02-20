<?php

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

//Rutas autenticacion
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Inicio
Route::get('/inicio', 'ClinicaController@index');

//Pacientes
Route::get('/pacientes', 'PacienteController@index');
Route::get('/pacientes/create', 'PacienteController@create');

//Medicos
Route::get('/medicos', 'MedicoController@index');
Route::get('/medicos/create', 'MedicoController@create');

//Citas
Route::get('/citas', 'CitasController@index');
Route::get('//citas/create', 'CitasController@create');

//Tratamientos
Route::get('/tratamientos', 'TratamientoController@index');

//Tipos de tratamientos
Route::get('/tratamientos_tipos', 'TipoTratamientoController@index');

//Especialidades
Route::get('/especialidades', 'EspecialidadesController@index');

//Especialidades medicos
Route::get('/especialidades_medicos', 'EspecialidadesMedicosController@index');

