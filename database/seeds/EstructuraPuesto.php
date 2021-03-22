<?php

use Illuminate\Database\Seeder;

class EstructuraPuesto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {        
        \DB::table('estructura_puestos')->insert(
    	[    			
        	['id' => '10', 'puesto' => 'ADMINISTRADOR'],
            ['id' => '20', 'puesto' => 'REPRESENTANTE DE CASILLA'],
        	['id' => '30', 'puesto' => 'REPRESENTANTE GENERAL'],
        	['id' => '40', 'puesto' => 'REPRESENTANTE DEL PARTIDO'],           
        ]);
    }   		
}