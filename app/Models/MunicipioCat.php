<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MunicipioCat extends Model
{
    public $timestamps = false;
    protected $table = "municipios_cat";
    protected $fields = ['activo'];

       
    public function distritocat()
    {
    	return $this->belongsTo('App\Models\DistritoCat','distrito_cat_clave','clave');
    }

    public function secciones()
    {
    	return $this->hasMany('App\Models\Seccione','clave','municipio_cat_clave');
    }

    public function getActiveAttribute()
    {           
    
       return ($this->attributes['activo'] == 1 ? 'SI' : 'NO');        
    }

    // public function setActiveAttribute($activo)
    //{
       
      // return $activo == 'SI' ? 1 : 0;
       
    //}
}
