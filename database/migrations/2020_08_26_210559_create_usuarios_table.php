<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {            
            $table->increments('id');
            $table->string('usuario',30)->index();
            $table->string('email',35)->unique()->index();
            $table->timestamp('email_verificado')->nullable();
            $table->string('contrasena');
            $table->integer('estatus');
            $table->integer('estructura_id')->unsigned()->index();
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
