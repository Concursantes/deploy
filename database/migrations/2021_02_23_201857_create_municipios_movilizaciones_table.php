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
            $table->id();
            $table->integer('municipio_clave')->unsigned()->index()->unique();            
            $table->integer('seccione_id')->unsigned()->nullable();          
            $table->integer('comites_movilizados')->unsigned();          
            $table->integer('vocales_confirmados')->unsigned();          
            $table->integer('comites_completos_movilizados')->unsigned();                      
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
