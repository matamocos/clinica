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
//Route::get('/pacientes/show/{id}', 'PacienteController@show');
//Route::get('/pacientes/update/{id}', 'PacienteController@update');
//Route::put('/pacientes/edit/{id}', 'PacienteController@destroy');
Route::delete('/pacientes/destroy/{id}', 'PacienteController@destroy');
//Route::post('/pacientes/store', 'PacienteController@destroy');

//Medicos
Route::get('/medicos', 'MedicoController@index');
Route::get('/medicos/create', 'MedicoController@create');
Route::delete('/medicos/destroy/{id}', 'MedicoController@destroy');
Route::post('/medicos/store', 'MedicoController@store');

//Citas
Route::get('/citas', 'CitasController@index');
Route::get('/citas/create', 'CitasController@create');
Route::delete('/citas/destroy/{id}', 'CitasController@destroy');

//Tratamientos
Route::get('/tratamientos', 'TratamientoController@index');
Route::get('/tratamientos/create', 'TratamientoController@create');
Route::delete('/tratamientos/destroy/{id}', 'TratamientoController@destroy');

//Tipos de tratamientos
Route::get('/tratamientos_tipos', 'TipoTratamientoController@index');
Route::get('/tratamientos_tipos/create', 'TipoTratamientoController@create');
Route::delete('/tratamientos_tipos/destroy/{id}', 'TipoTratamientoController@destroy');

//Especialidades
Route::get('/especialidades', 'EspecialidadesController@index');
Route::get('/especialidades/create', 'EspecialidadesController@create');
Route::delete('/especialidades/destroy/{id}', 'EspecialidadesController@destroy');

//Especialidades medicos
//Route::get('/especialidades_medicos', 'EspecialidadesMedicosController@index');

