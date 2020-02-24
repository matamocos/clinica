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

//Rutas autenticación
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Inicio
Route::get('/inicio', 'ClinicaController@index');

//Pacientes
Route::get('/pacientes', 'PacienteController@index');
Route::get('/pacientes/create', 'PacienteController@create');
//Route::get('/pacientes/show/{id}', 'PacienteController@show');
Route::get('/pacientes/edit/{id}', 'PacienteController@edit');
Route::put('/pacientes/update/{id}', 'PacienteController@update');
Route::delete('/pacientes/destroy/{id}', 'PacienteController@destroy');
Route::post('/pacientes/store', 'PacienteController@store');

//Medicos
Route::get('/medicos', 'MedicoController@index');
Route::get('/medicos/create', 'MedicoController@create');
//Route::get('/medicos/show/{id}', 'MedicoController@show');
Route::get('/medicos/edit/{id}', 'MedicoController@edit');
Route::put('/medicos/update/{id}', 'MedicoController@update');
Route::delete('/medicos/destroy/{id}', 'MedicoController@destroy');
Route::post('/medicos/store', 'MedicoController@store');

//Citas
Route::get('/citas', 'CitasController@index');
Route::get('/citas/create', 'CitasController@create');
Route::get('/citas/edit/{id}', 'CitasController@edit');
Route::put('/citas/update/{id}', 'CitasController@update');
Route::delete('/citas/destroy/{id}', 'CitasController@destroy');
Route::post('/citas/store', 'CitasController@store');
Route::get('/citas/show/{id}', 'CitasController@show');

//Tratamientos
Route::get('/tratamientos', 'TratamientoController@index');
Route::get('/tratamientos/create', 'TratamientoController@create');
Route::get('/tratamientos/edit/{id}', 'TratamientoController@edit');
Route::put('/tratamientos/update/{id}', 'TratamientoController@update');
Route::delete('/tratamientos/destroy/{id}', 'TratamientoController@destroy');
Route::post('/tratamientos/store', 'TratamientoController@store');

//Tipos de tratamientos
Route::get('/tratamientos_tipos', 'TipoTratamientoController@index');
Route::get('/tratamientos_tipos/create', 'TipoTratamientoController@create');
Route::get('/tratamientos_tipos/edit/{id}', 'TipoTratamientoController@edit');
Route::put('/tratamientos_tipos/update/{id}', 'TipoTratamientoController@update');
Route::delete('/tratamientos_tipos/destroy/{id}', 'TipoTratamientoController@destroy');
Route::post('/tratamientos_tipos/store', 'TipoTratamientoController@store');

//Especialidades
Route::get('/especialidades', 'EspecialidadesController@index');
Route::get('/especialidades/create', 'EspecialidadesController@create');
Route::get('/especialidades/edit/{id}', 'EspecialidadesController@edit');
Route::put('/especialidades/update/{id}', 'EspecialidadesController@update');
Route::delete('/especialidades/destroy/{id}', 'EspecialidadesController@destroy');
Route::post('/especialidades/store', 'EspecialidadesController@store');

//Especialidades medicos
//Route::get('/especialidades_medicos', 'EspecialidadesMedicosController@index');





Route::get('/pruebas', function () {
 
	/*
	$prueba = \App\Cita::join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
						->join('medicos', 'citas.medico_id', '=', 'medico.id')
						->selectRaw("*")
						->get();
	*/	
	
	$prueba = \App\Cita::select('medicos.nombre AS nombre_medico',
								'medicos.apellido_1 AS apellido_1_medico',
								'medicos.apellido_2 AS apellido_2_medico',
								'medicos.fecha_nacimiento AS fecha_nacimiento_medico',
								'medicos.telefono AS telefono_medico',
								'pais','ciudad', 'email', 'dni', 'genero', 'direccion')
						->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
						->join('medicos', 'citas.medico_id', '=', 'medicos.id')
						->get()[0];
	
		return $prueba;
});




