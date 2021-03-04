<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    public $timestamps = false;
    //protected $fields = ['activo'];

    # O de esta (se definen propiedades para evitar realizar asignación masiva)
    //protected $guarded = []; //en lugar de modificar $fillable se modifica este array
   
    //Definiciòn de campos insertables desde el mètodo create en el controller
    protected $fillable = 
    [
        'nombre',
        'estado_id',
        'clave',
        'activo',
    ];

    public function estado()
    {
    	return $this->belongsTo('App\Models\Estado');
    }

    public function colonias()
    {
    	return $this->hasMany('App\Models\Colonia');
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
