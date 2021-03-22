<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRepresentantesRequest;
use App\Models\MunicipiosRepresentante;
use App\Models\EstructuraPuesto;
use response;

class MunicipiosRepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = MunicipiosRepresentante::query()
        ->select(['id','apepat','apemat','nombre','telefono_celular','seccione_id','tipo_casilla_id','casilla','municipio_clave','estructura_puesto_id','estructura_puesto_tipo_id'])        
        ->with
        (
            [
                  'seccione'=>function($query) //use ($fieldSearch, $search)
                  {                     
                      $query->select('id','clave');                        
                  },
                  'tipocasilla'=>function($query)
                  {
                      $query->select('id','tipo_casilla');
                  },                  
                  'municipio'=>function($query)
                  {
                      $query->select('id','nombre');
                  },                  
                  'estructurapuesto'=>function($query)
                  {
                      $query->select('id','puesto');
                  },                                 
                  'estructurapuestotipo'=>function($query)
                  {
                      $query->select('id','tipo');
                  },  
              ]
          )->paginate(); 

        return view('representantes.index',compact('items'));     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)     // al crear formulario para envio de datos para guardar
    {       
      $user_logueado = auth()->user();

      //$rol_maximo = 70;
      if($user_logueado->rol == 10)
        { 
          if($user_logueado->estructura_id == 0)
          { 
            $rol_minimo = $user_logueado->rol;
            $rol_maximo = $user_logueado->rol;
          }
          else if($user_logueado->estructura_id > 0)
          { 
            $rol_minimo = $user_logueado->rol + 20;
            $rol_maximo = $user_logueado->rol + 40;
          }
        }
        else  if($user_logueado->rol == 30)
        {
            $rol_minimo = $user_logueado->rol + 10;
            $rol_maximo = $user_logueado->rol + 20;
        }
        else  if($user_logueado->rol == 40)
        {
            $rol_minimo = $user_logueado->rol + 10;
            $rol_maximo = $user_logueado->rol + 10;
        }
        else  if($user_logueado->rol == 50)
        {
            $rol_minimo = $user_logueado->rol + 10;
            $rol_maximo = $user_logueado->rol + 20;
        }
        else  if($user_logueado->rol == 60)
        {
            $rol_minimo = $user_logueado->rol + 10;
            $rol_maximo = $user_logueado->rol + 10;
        }
      //dd($rol_maximo);
     
      $estructuraPuestos = EstructuraPuesto::whereBetween('id', array($rol_minimo,$rol_maximo))->get()->unique('puesto');
      
      //$estructuraZonas = Zona::all();
      $estructuraAreas = Area::all();
      $estados = Estado::select('id','nombre')->get();
      $colonias = Colonia::all();
      $codigos_postales = Colonia::get()->unique('codigo_postal');
      
      $user = Estructura::select('id','area','zona','seccione_id')->where('id',auth()->user()->estructura_id)->first();

      $secciones;
      $estructuraZonas;
      
      if ($user_logueado->rol == 10)
      {
          $secciones = Seccione::select('id','clave')->get(); 
          $estructuraZonas = EstructuraZona::select('zona')->distinct('zona')
          ->with
          (
            [
              'zonas'=>function($query)
              {
                $query->select('id','descripcion');
              }
            ]
          )->get();          
      }

      if ($user_logueado->rol == 30)
      {
       $estructuraZonas = EstructuraZona::select('zona')->where('area',$user->area)->distinct('zona')
       ->with
       (
        [
                    'zonas'=>function($query)
                    {
                      $query->select('id','descripcion');
                    }
                  ]
                )->get();
               
      }

      if ($user_logueado->rol == 40)
      {
       $secciones = EstructuraZona::select('seccione_id')->where('zona',$user->zona)->distinct('seccione_id')
       ->with
       (
        [
                    'seccione'=>function($query) //use ($fieldSearch, $search)
                    {                     
                      $query->select('id','clave');                        
                    }
                  ]
                )->get();
               
      }
      elseif ($user_logueado->rol >= 50 || $user_logueado->rol == 60)
      {      
        $secciones = EstructuraZona::select('seccione_id')->where('seccione_id',$user->seccione_id)->distinct('seccione_id')
        ->with
        (
          [
                    'seccione'=>function($query) //use ($fieldSearch, $search)
                    {                     
                      $query->select('id','clave');                        
                    }
          ]
        )->get(); 
      }

      $municipios = Municipio::select('id','nombre')->get();
      $tipoCasillas = TipoCasilla::all();  

      $puestoUserLogueado = Estructura::select('area','zona','seccione_id')
      ->where('id',auth()->user()->estructura_id)
      ->with
      (
        [
                    'seccione'=>function($query) //use ($fieldSearch, $search)
                    {                     
                      $query->select('id','clave');                        
                    },                    
                    'zonas'=>function($query)
                    {
                      $query->select('id','descripcion');
                    },
                    'areas'=>function($query)
                    {
                      $query->select('id','descripcion');
                    },                   
                  ]
                )
      ->first();        

      return view('representantes.create',compact('estructuraPuestos'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
