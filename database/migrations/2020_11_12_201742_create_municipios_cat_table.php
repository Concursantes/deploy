<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_cat', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nombre',80)->index();   
            $table->integer('distrito_cat_clave')->unsigned();            
            $table->string('clave',6)->index();                                
            $table->integer('activo')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios_cat');
    }
}
