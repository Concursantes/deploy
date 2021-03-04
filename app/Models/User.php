<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EstructuraPuesto;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Model
{
    use HasRoles;
}
