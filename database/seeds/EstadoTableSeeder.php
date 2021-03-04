<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

        

        $faker = Faker::create();
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

        $faker = Faker::create();
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
