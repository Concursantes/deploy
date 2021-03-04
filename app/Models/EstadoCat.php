<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCat extends Model
{
    public $timestamps = false;
  	protected $table = "estados_cat";
  	
    public function distritos()
    {
    	return $this->hasMany('App\Models\DistritoCat','clave','estado_cat_clave');
    }

    public function secciones()
    {
    	return $this->hasMany('App\Models\Seccione','clave','estado_cat_clave');
    }
}
