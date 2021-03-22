<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_clave')->unsigned()->index();  
            $table->integer('estado_cat_clave')->unsigned();      
            $table->integer('seccione_tipo_id')->unsigned()->nullable();  
            $table->string('clave',6)->index()->unique()->nullable();  
            $table->integer('distrito_cat_clave')->unsigned()->nullable();
            $table->integer('activo')->unsigned()->default(1)->comment('1: ACTIVO. 0: INACTIVO');
            $table->integer('total_cabecera')->unsigned()->nullable();  
            $table->integer('total_urbana')->unsigned()->nullable();  
            $table->integer('total_rural')->unsigned()->nullable();  
            $table->integer('total_mixta')->unsigned()->nullable();  
            $table->integer('usuario_id')->unsigned()->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secciones');
    }
}
