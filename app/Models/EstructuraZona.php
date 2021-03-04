<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstructuraZona extends Model
{
    public $timestamps = false;

    protected $table = "estructura_zonas";

    protected $fillable = 
    [
        'area_id',
        'zona',
        'seccione_id',
        'coord_seccion',
        'coord_estrategico',
        'comite_base',
        'convencidos'
    ];  


    public function seccione()
    {
        return $this->belongsTo('App\Models\Seccione');
    }  
    
    public function zonas()
    {
        return $this->belongsTo('App\Models\Zona','zona','id');
    }

    public function areas()
    {
        return $this->belongsTo('App\Models\Area','area','id');
    }
    
}
