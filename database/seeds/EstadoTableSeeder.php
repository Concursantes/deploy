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

        

        
        for ($i=1; $i <= 40; $i++) 
        {
            \DB::table('areas')->insert
            (
                array
                (
                    'descripcion' =>'AREA ' . $i,                    
                )
            );
        }

       
        for ($i=1; $i <= 70; $i++) 
        {
            \DB::table('zonas')->insert
            (
                array
                (
                    'descripcion' =>'ZONA ' . $i,                    
                )
            );
        }


    }
}
