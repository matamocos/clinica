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

//Rutas autenticaciรณn
Auth::routes();

Route::get('/', function () {
	return view('welcome');
})->middleware('idioma')->name('Página de bienvenida');

//rutas loging para Socialite
Route::get('login/{provider}', 'SocialController@redireccion');
Route::get('login/{provider}/callback','SocialController@Callback');



//Ruta para cambio de idioma
Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
        return \Redirect::back();
	})->where([
        'lang' => 'en|es'
])->name('Selección de idioma');//fin lang
	
Route::group(['middleware' => ['idioma', 'auth']], function () {

	//Route::get('/home', 'HomeController@index')->name('home');

	//Inicio
	Route::get('/inicio', 'ClinicaController@index')->name('Página inicio');
	Route::get('/welcome', 'ClinicaController@index')->name('Página welcome');
	Route::get('/estadisticas', 'ClinicaController@estadisticas')->name('Página de estadísticas');

	//Pacientes
	Route::get('/pacientes', 'PacienteController@index')->name('Listado pacientes');
	Route::get('/pacientes/create', 'PacienteController@create')->name('Creación de pacientes');
	Route::get('/pacientes/show/{id}', 'PacienteController@show')->name('Visualizar un solo paciente');
	Route::get('/pacientes/edit/{id}', 'PacienteController@edit')->name('Edición de un paciente');
	Route::put('/pacientes/update/{id}', 'PacienteController@update')->name('Actualización de un paciente');
	Route::delete('/pacientes/destroy/{id}', 'PacienteController@destroy')->name('Borrado de un paciente');
	Route::post('/pacientes/store', 'PacienteController@store')->name('Guardado de un paciente');

	//Medicos
	Route::get('/medicos', 'MedicoController@index')->name('Listado de médicos');
	Route::get('/medicos/create', 'MedicoController@create')->name('Creación de un médico');
	Route::get('/medicos/show/{id}', 'MedicoController@show')->name('Visualizar un solo médico');
	Route::get('/medicos/edit/{id}', 'MedicoController@edit')->name('Edición de un médico');
	Route::put('/medicos/update/{id}', 'MedicoController@update')->name('Actualización de un médico');
	Route::delete('/medicos/destroy/{id}', 'MedicoController@destroy')->name('Borrado de un médico');
	Route::post('/medicos/store', 'MedicoController@store')->name('Guardado de un medico');

	//Citas
	Route::get('/citas', 'CitasController@index')->name('Listado de citas');
	Route::get('/citas/create', 'CitasController@create')->name('Creación de una cita');
	Route::get('/citas/edit/{id}', 'CitasController@edit')->name('Edición de una cita');
	Route::put('/citas/update/{id}', 'CitasController@update')->name('Actualización de un cita');
	Route::delete('/citas/destroy/{id}', 'CitasController@destroy')->name('Borrado de una cita');
	Route::post('/citas/store', 'CitasController@store')->name('Almacenado de una cita');
	Route::get('/citas/show/{id}', 'CitasController@show')->name('Visualización de una cita');

	//Tratamientos
	Route::get('/tratamientos', 'TratamientoController@index')->name('Listado de tratamiento');
	Route::get('/tratamientos/create', 'TratamientoController@create')->name('Creación de un tratamiento');
	Route::get('/tratamientos/edit/{id}', 'TratamientoController@edit')->name('Edición de un tratamiento');
	Route::put('/tratamientos/update/{id}', 'TratamientoController@update')->name('Actualización de un tratamiento');
	Route::delete('/tratamientos/destroy/{id}', 'TratamientoController@destroy')->name('Borrado de una cita');
	Route::post('/tratamientos/store', 'TratamientoController@store')->name('Almacenado de una cita');
	Route::get('/tratamientos/show/{id}', 'TratamientoController@show')->name('Visualización de una cita');

	//Tipos de tratamientos
	Route::get('/tratamientos_tipos', 'TipoTratamientoController@index')->name('Listado tipos de tratamientos');
	Route::get('/tratamientos_tipos/create', 'TipoTratamientoController@create')->name('Creación de un tipo de tratamiento');
	Route::get('/tratamientos_tipos/edit/{id}', 'TipoTratamientoController@edit')->name('Edición de un tipo de tratamiento');
	Route::put('/tratamientos_tipos/update/{id}', 'TipoTratamientoController@update')->name('Actualización de un tipo de tratamiento');
	Route::delete('/tratamientos_tipos/destroy/{id}', 'TipoTratamientoController@destroy')->name('Borrado de un tipo de tratamiento');
	Route::post('/tratamientos_tipos/store', 'TipoTratamientoController@store')->name('Almacenado de un tipo de tratamiento');

	//Especialidades
	Route::get('/especialidades', 'EspecialidadesController@index')->name('Listado de especialidades');
	Route::get('/especialidades/create', 'EspecialidadesController@create')->name('Creaión de un especialidad');
	Route::get('/especialidades/edit/{id}', 'EspecialidadesController@edit')->name('Edición de una especialidad');
	Route::put('/especialidades/update/{id}', 'EspecialidadesController@update')->name('Actualización de una especialidad');
	Route::delete('/especialidades/destroy/{id}', 'EspecialidadesController@destroy')->name('Borrado de una especialidad');
	Route::post('/especialidades/store', 'EspecialidadesController@store')->name('Almacenado de una especialidad');

	//Especialidades medicos
	Route::post('/especialidades_medicos/store', 'EspecialidadesMedicosController@store')->name('Almacenado especialidad-medico');
	Route::delete('/especialidades_medicos/destroy/{id}/{medico_id}', 'EspecialidadesMedicosController@destroy')->name('Borrado especialidades-médicos');
	
	//Ruta simular cita (email y pdf)
	Route::get('/simular','PacienteController@simular')->name('Simulación creación de un cita');
	Route::post('/simular/pdf','PacienteController@pdf')->name('Generación PDF');
	
	
	
});//fin middleware idioma
	






