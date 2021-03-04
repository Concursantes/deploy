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
       
        $this->call(TiposCasillaTableSeeder::class);
        $this->call(SeccionesTipoTableSeeder::class);        
        $this->call(EstructuraPuesto::class);       
        $this->call(CuestionariosTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(EstadoCatTableSeeder::class);     
        $this->call(ColoniasTipoSeeder::class); 
        $this->call(RoleTableSeeder::class);     
        $this->call(UsersTableSeeder::class);     

            
        
    }
}