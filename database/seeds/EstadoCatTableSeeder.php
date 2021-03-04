<?php

use Illuminate\Database\Seeder;

class EstadoCatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('estados_cat')->insert(    		
    		[    			
		        [
		        'nombre' => 'CHIAPAS', 
		        'clave'=>'07', 
		        'activo'=>'1',
		        ],		                 	    			
    		]);
    }
}
