<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MunicipiosRepresentante extends Model
{
	protected $fillable = 
	[
		'id','apepat','apemat','nombre','telefono_celular','seccione_id','tipo_casilla_id','casilla','municipio_clave','estructura_puesto_id','estructura_puesto_tipo_id','direccion','email', 'usuario_id'
	];   


	public function tipocasilla()
	{
		return $this->belongsTo('App\Models\TipoCasilla','tipo_casilla_id','id');
	}
	
	public function municipio()
	{
		return $this->belongsTo('App\Models\Municipio','municipio_clave','id');
	}
	
	public function estructurapuesto()
	{
		return $this->belongsTo('App\Models\EstructuraPuesto','estructura_puesto_id','id');
	}

	public function estructurapuestotipo()
	{
		return $this->belongsTo('App\Models\EstructuraPuesto','estructura_puesto_tipo_id','id');
	}

	public function usuario()
	{
		return $this->belongsTo('App\Models\User','usuario_id','id');
	}

	public function seccione()
	{
		return $this->belongsTo('App\Models\Seccione','seccione_id','id');
	}  	
	
}
