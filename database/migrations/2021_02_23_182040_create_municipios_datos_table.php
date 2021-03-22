<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_datos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_clave')->unsigned()->index()->unique();
            $table->string('municipio_nombre',60)->nullable();
            $table->string('opera_sistema',2)->index();
            $table->integer('seccion_inicio')->unsigned();
            $table->integer('seccion_fin')->unsigned();         
            $table->string('apepat',60)->index();
            $table->string('apemat',60)->nullable()->index();
            $table->string('nombre',80)->index();
            $table->string('telefono_celular',10);   
            $table->integer('usuario_id')->unsigned()->nullable();                   
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
        Schema::dropIfExists('municipios_datos');
    }
}
