<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('estados')->insert(    		
    		[    			
		        [
		        'nombre' => 'CHIAPAS', 
		        'clave'=>'07', 
		        'activo'=>'1',
		        ],		                 	    			
    		]);

        

      
       


    }
}
