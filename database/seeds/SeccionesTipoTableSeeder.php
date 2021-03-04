<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SeccionesTipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        \DB::table('seccione_tipos')->insert(
    		[    			
    			['tipo' => 'MIXTO(A)'],
    			['tipo' => 'URBANO(A)'],
    			['tipo' => 'RURAL'],    			
                ['tipo' => 'SIN TIPO']   
    		]);
    }
}
