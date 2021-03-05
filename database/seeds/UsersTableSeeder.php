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
    	
    	     

       
    }

    
}
