<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
			$table->date('fecha');
			$table->time('hora');
			$table->string('motivo');
			$table->string('observaciones');
			$table->integer('paciente_id')->unsigned();
			//$table->foreign('paciente_id')->references('id')->on('pacientes');
			$table->integer('medico_id')->unsigned();	
			//$table->foreign('medico_id')->references('id')->on('medicos');
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
