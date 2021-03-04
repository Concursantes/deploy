<?php

use Illuminate\Database\Seeder;
use App\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Http\Controllers\UsersController;

use Spatie\Permission\Traits\HasRoles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use HasRoles;

    public function run()
    {
    	$admin = User::create([
    		/*
            'name' => 'USUARIO INICIAL',
            'usuario' => 'usuario0',    		
            'rol' =>10,
    		'password' => bcrypt('12345678'),
            'estatus' => 1,
            'estructura_id' => 0
            */
    	]);        

        $admin->assignRole(['ADMINISTRADOR']);
    }

    
}