<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class TiposCasillaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $faker = Faker::create();
        \DB::table('tipo_casillas')->insert(
    		[    			
    			['tipo_casilla' => 'BASICA'],
    			['tipo_casilla' => 'CONTIGUA'],
    			['tipo_casilla' => 'EXTRAORDINARIA'],
    			['tipo_casilla' => 'ESPECIAL'],
                ['tipo_casilla' => 'SIN TIPO']
    		]);
    }
}