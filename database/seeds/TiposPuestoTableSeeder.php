<?php

use Illuminate\Database\Seeder;

class TiposPuestoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('estructura_puesto_tipos')->insert(
    	[    			
        	['tipo' => 'PROPIETARIO'],
        	['tipo' => 'SUPLENTE'],        	         
        ]);
    }
}
