<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosMovilizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_movilizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_clave')->unsigned()->index();                              
            $table->integer('movimientos')->unsigned();          
            $table->integer('contabilizados')->unsigned();          
            $table->integer('movimientos_completos')->unsigned();                      
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
        Schema::dropIfExists('municipios_movilizaciones');
    }
}
