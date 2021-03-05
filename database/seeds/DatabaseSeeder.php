<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
       $this->call(SeccionesTipoTableSeeder::class);               
        $this->call(EstadoTableSeeder::class);
        $this->call(EstadoCatTableSeeder::class);             
        $this->call(RoleTableSeeder::class);     
        $this->call(UsersTableSeeder::class);     

            
        
    }
}
