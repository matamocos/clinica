<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
			$table->string('descripcion')->nullable();
			$table->date('fecha_inicio')->default(Carbon::now('UTC')->format('20y-m-d'));
			$table->date('fecha_fin')->nullable();
			$table->integer('medico_id')->unsigned();
			$table->integer('paciente_id')->unsigned();
			$table->integer('tipo_tratamiento_id')->unsigned();
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
