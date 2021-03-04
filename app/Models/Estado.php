<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    public $timestamps = false;
  

    public function municipios()
    {
    	return $this->hasMany('App\Models\Municipio');
    }
}