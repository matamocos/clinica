<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		function hora(){
			date_default_timezone_set('Europe/London');
			$hora = date('G:i:s', time());
			return $hora;
		}
		
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
			$table->date('fecha')->default(Carbon::now('UTC')->format('20y-m-d'));
			$table->time('hora')->default(hora());
			$table->string('motivo');
			$table->string('observaciones')->nullable();
			$table->integer('paciente_id')->unsigned();
			$table->integer('medico_id')->unsigned();	
            $table->timestamps();	
			
        });	
		
    }
	
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
