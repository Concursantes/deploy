<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Http\Controllers\UsersController;

use Spatie\Permission\Traits\HasRoles;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 $admin = 				Role::create(['name'=>'ADMINISTRADOR']);
         $usuario_mpio = 		Role::create(['name'=>'USUARIO GLOBAL MUNICIPAL']);

    	 Permission::create(['name'=>'representantes.index','descripcion'=>'Consultar Representantes'])
        ->syncRoles([$admin, $usuario_mpio]);
        Permission::create(['name'=>'representantes.create','descripcion'=>'Agregar Representantes'])
        ->syncRoles([$admin, $usuario_mpio]);
         Permission::create(['name'=>'representantes.edit','descripcion'=>'Editar Representantes'])
        ->syncRoles([$admin, $usuario_mpio]);
    }
}
