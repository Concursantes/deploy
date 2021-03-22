<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosMetasRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_metas_representantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_clave')->unsigned()->index();            
            $table->integer('rc')->unsigned();          
            $table->integer('rg')->unsigned();          
            $table->integer('rp')->unsigned();                    
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
        Schema::dropIfExists('municipios_metas_representantes');
    }
}
