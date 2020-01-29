<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadeMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidade_medico', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('medico_id')->unsigned();
			$table->integer('especialidade_id')->unsigned();
			$table->foreign('medico_id')->references('id')->on('medicos');
			$table->foreign('especialidade_id')->references('id')->on('especialidades');
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
        Schema::dropIfExists('especialidade_medico');
    }
}
