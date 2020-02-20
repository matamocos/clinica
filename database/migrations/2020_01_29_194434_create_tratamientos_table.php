<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('descripcion');
			$table->integer('medico_id')->unsigned();
			//$table->foreign('medico_id')->references('id')->on('medicos');
			$table->integer('paciente_id')->unsigned();
			//$table->foreign('paciente_id')->references('id')->on('pacientes');
			$table->integer('tipo_tratamiento_id')->unsigned();
			//$table->foreign('tipo_tratamiento_id')->references('id')->on('tipotratamientos');
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
        Schema::dropIfExists('tratamientos');
    }
}
