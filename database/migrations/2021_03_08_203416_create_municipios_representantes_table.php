<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios_representantes', function (Blueprint $table) {
            $table->increments('id');
 
            $table->integer('municipio_clave')->unsigned()->index();   
            $table->integer('seccione_id')->unsigned()->index();
            $table->integer('tipo_casilla_id')->unsigned()->index();
            $table->integer('casilla')->unsigned(); 

            $table->string('apepat',60)->index();
            $table->string('apemat',60)->nullable();
            $table->string('nombre',80)->index();
            $table->string('identificador',18)->unique()->index();  
            
            $table->string('direccion',200);                    
            $table->string('telefono_celular',10);                    
            $table->string('email',60)->unique()->nullable();

            $table->integer('estructura_puesto_id')->unsigned();
            $table->integer('estructura_puesto_tipo_id')->unsigned();

            $table->integer('usuario_id')->unsigned();   
            
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
        Schema::dropIfExists('municipios_representantes');
    }
}
