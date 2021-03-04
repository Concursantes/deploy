<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Illuminate\Contracts\Auth\Access\Authorizable;
use App\Models\EstructuraPuesto;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

use App\Http\Controllers\UsersController;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'usuario', 'password','rol','estructura_id','estatus','user_id',         
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function puesto()
    {
        return $this->belongsTo('App\Models\EstructuraPuesto','rol','id');
    }

    public function adminlte_desc()
    {
        $rol = EstructuraPuesto::findOrFail($this->rol);
        
        return $rol->puesto;
    }


}
