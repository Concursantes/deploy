<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosLogrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_logros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_clave')->unsigned()->index();            
            $table->integer('puesto10')->unsigned();          
            $table->integer('puesto30')->unsigned();                       
            $table->integer('puesto40')->unsigned();      
            $table->integer('puesto50')->unsigned();          
            $table->integer('puesto70')->unsigned();                  
            $table->integer('puesto80')->unsigned();          
            $table->integer('puesto90')->unsigned();          
            $table->integer('verdes')->unsigned(); 
            $table->integer('amarillos')->unsigned(); 
            $table->integer('rojos')->unsigned();   
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
        Schema::dropIfExists('municipios_logros');
    }
}
