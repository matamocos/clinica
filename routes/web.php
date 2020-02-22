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
Route::get('/pacientes/show/{id}', 'PacienteController@show');
Route::get('/pacientes/edit/{id}', 'PacienteController@edit');
Route::put('/pacientes/update/{id}', 'PacienteController@update');
Route::delete('/pacientes/destroy/{id}', 'PacienteController@destroy');
Route::post('/pacientes/store', 'PacienteController@store');

//Medicos
Route::get('/medicos', 'MedicoController@index');
Route::get('/medicos/create', 'MedicoController@create');
//Route::get('/medicos/show/{id}', 'MedicoController@show');
Route::get('/medicos/edit/{id}', 'MedicoController@edit');
Route::delete('/medicos/destroy/{id}', 'MedicoController@destroy');
Route::post('/medicos/store', 'MedicoController@store');

//Citas
Route::get('/citas', 'CitasController@index');
Route::get('/citas/create', 'CitasController@create');
Route::get('/citas/edit/{id}', 'CitasController@destroy');
Route::post('/citas/store', 'CitasController@store');
Route::delete('/citas/destroy/{id}', 'CitasController@destroy');

//Tratamientos
Route::get('/tratamientos', 'TratamientoController@index');
Route::get('/tratamientos/create', 'TratamientoController@create');
Route::get('/tratamientos/edit/{id}', 'TratamientoController@edit');
Route::post('/tratamientos/store', 'TratamientoController@store');
Route::delete('/tratamientos/destroy/{id}', 'TratamientoController@destroy');

//Tipos de tratamientos
Route::get('/tratamientos_tipos', 'TipoTratamientoController@index');
Route::get('/tratamientos_tipos/create', 'TipoTratamientoController@create');
Route::get('/tratamientos_tipos/edit/{id}', 'TipoTratamientoController@edit');
Route::post('/tratamientos_tipos/store', 'TipoTratamientoController@store');
Route::delete('/tratamientos_tipos/destroy/{id}', 'TipoTratamientoController@destroy');

//Especialidades
Route::get('/especialidades', 'EspecialidadesController@index');
Route::get('/especialidades/create', 'EspecialidadesController@create');
Route::get('/especialidades/edit/{id}', 'EspecialidadesController@edit');
Route::post('/especialidades/store', 'EspecialidadesController@store');
Route::delete('/especialidades/destroy/{id}', 'EspecialidadesController@destroy');

//Especialidades medicos
//Route::get('/especialidades_medicos', 'EspecialidadesMedicosController@index');