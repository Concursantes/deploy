<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccione extends Model
{
    public $timestamps = false;

    protected $fillable = 
    [
        'municipio_cat_clave','estado_cat_clave','clave','activo','seccione_tipo_id','total_cabecera','total_urbana','total_rural','total_mixta','usuario_id',
    ];


    public function municipio()
    {
    	return $this->belongsTo('App\Models\MunicipiocAT','municipio_cat_clave','id');
    }    

    public function estado()
    {
    	return $this->belongsTo('App\Models\EstadoCat','estado_cat_clave','id');
    }

 	public function seccioneTipo()
    {
    	return $this->belongsTo('App\Models\SeccioneTipo','seccione_tipo_id','id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','usuario_id','id');
    }

    public function getActiveAttribute()
    {           
    
       return ($this->attributes['activo'] == 1 ? 'SI' : 'NO');        
    }
}
