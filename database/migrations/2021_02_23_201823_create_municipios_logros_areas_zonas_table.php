<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosLogrosAreasZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_logros_areas_zonas', function (Blueprint $table) {
            $table->integer('municipio_clave')->unsigned()->index()->unique();            
            $table->integer('coord_municipal')->unsigned();          
            $table->integer('coord_area')->unsigned();          
            $table->integer('area_id')->unsigned()->nullable();          
            $table->integer('coord_zona')->unsigned();                      
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
        Schema::dropIfExists('municipios_logros_areas_zonas');
    }
}
