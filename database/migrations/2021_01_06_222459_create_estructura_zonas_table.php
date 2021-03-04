<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstructuraZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estructura_zonas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_clave')->unsigned()->index();
            $table->integer('area')->unsigned()->index();    
            $table->integer('zona')->unsigned()->index();    
            $table->integer('seccione_id')->unsigned()->index();
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
        Schema::dropIfExists('estructura_zonas');
    }
}
