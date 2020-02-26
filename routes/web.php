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


Route::group(['middleware' => ['idioma']], function () {

	Route::get('/', function () {
		return view('welcome');
	});

	//Rutas autenticaciรณn
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
	Route::get('/medicos/show/{id}', 'MedicoController@show');
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
	Route::get('/tratamientos/show/{id}', 'TratamientoController@show');

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
	Route::post('/especialidades_medicos/store', 'EspecialidadesMedicosController@store');
	Route::delete('/especialidades_medicos/destroy/{id}/{medico_id}', 'EspecialidadesMedicosController@destroy');
	
	//ruta para cambio de idioma
	Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
        return \Redirect::back();
	})->where([
        'lang' => 'en|es'
	]);//fin lang

});//fin middleware idioma
	
	

//////////////////////PREUBA////////////////////////
	
Route::group(['middleware' => ['idioma']], function () {
	

Route::get('/prueba', function () {
    return view('pruebastraduccion');
});
	
	
Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
        return \Redirect::back();
})->where([
        'lang' => 'en|es'
]);//fin lang


});









