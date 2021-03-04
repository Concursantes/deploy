<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosMetasSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_metas_secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_clave')->unsigned()->index()->unique();            
            $table->integer('seccione_id')->unsigned()->nullable();          
            $table->integer('coord_seccion')->unsigned();          
            $table->integer('coord_estrategico')->unsigned();          
            $table->integer('comite_base')->unsigned();          
            $table->integer('convencidos')->unsigned(); 
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
        Schema::dropIfExists('municipios_metas_secciones');
    }
}
