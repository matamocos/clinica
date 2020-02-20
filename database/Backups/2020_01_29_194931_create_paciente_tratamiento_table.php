<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_tratamiento', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('paciente_id')->unsigned();
			$table->integer('tratamiento_id')->unsigned();
			$table->foreign('paciente_id')->references('id')->on('pacientes');
			$table->foreign('tratamiento_id')->references('id')->on('tratamientos');
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
        Schema::dropIfExists('paciente_tratamiento');
    }
}
