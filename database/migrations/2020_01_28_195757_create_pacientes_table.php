<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nombre', 50);
			$table->string('apellido_1', 100);
			$table->string('apellido_2', 100);
			$table->string('pais',100);
			$table->string('ciudad',100);
			$table->date('fecha_nacimiento');
			$table->string('direccion', 255);
			$table->string('genero', 50);
			$table->string('telefono', 50);	
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
        Schema::dropIfExists('pacientes');
    }
}
