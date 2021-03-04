<?php

namespace App\Observers;

use App\Models\Estructura;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class EstructuraObserver
{
    /**
     * Handle the estructura "created" event.
     
     * @param  \App\App\Models\Estructura  $estructura
     * @return void
     */

    use HasRoles;

    public function created(Estructura $estructura)
    {
        //dd(date_format($estructura->fecha_nacimiento,"dmy"));
        
        $user = new User();            
        $user->name = $estructura->nombre . ' '. $estructura->apepat . ' ' . $estructura->apemat;
        $user->usuario = $estructura->identificador;
        $fecha_nacimiento_tempo = bcrypt( date_format($estructura->fecha_nacimiento,"dmy") );        
        $user->password = $fecha_nacimiento_tempo;
        $user->rol = $estructura->estructura_puesto_id;
        $user->estructura_id = $estructura->id;
        $user->estatus = 1;
        $user->user_id = $estructura->usuario_id;        
        $user->save();

        // Tabla: model_has_roles
        
        $user->assignRole($user->puesto->puesto);
    }

    /**
     * Handle the estructura "updated" event.
     *
     * @param  \App\App\Models\Estructura  $estructura
     * @return void
     */
    public function updated(Estructura $estructura)
    {
        //
    }

    /**
     * Handle the estructura "deleted" event.
     *
     * @param  \App\App\Models\Estructura  $estructura
     * @return void
     */
    public function deleted(Estructura $estructura)
    {
        //
    }

    /**
     * Handle the estructura "restored" event.
     *
     * @param  \App\App\Models\Estructura  $estructura
     * @return void
     */
    public function restored(Estructura $estructura)
    {
        //
    }

    /**
     * Handle the estructura "force deleted" event.
     *
     * @param  \App\App\Models\Estructura  $estructura
     * @return void
     */
    public function forceDeleted(Estructura $estructura)
    {
        //
    }
}
