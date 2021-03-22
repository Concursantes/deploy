@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('css')




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

@endsection



@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}"> 
                      

<div class="container">  
  <div class="card" style="width: 60rem text-align: center;">
    <div class="card-header text-center">
      <h4> Agregar Representante </h4>
    </div>

    <div class="card-body"> 

      <form method="POST" action="{{ route('representantes.store') }}" class="p-0 form" id="miform" >
        @method('POST')
        @csrf

        <div class="row ">
          <legend>Datos Basicos</legend>


          <div class="col-md-4 form-group">  
            <label for="identificador"> Identificador: </label>                      
            <input type="text" class="form-control" name="identificador" id="identificador" value="{{ old('identificador') }}" autofocus="">
            @error('identificador') <span class="text-danger">{{ $message }}</span>@enderror  
          </div>                       

          <div class="col-md-4 form-group">  
            <label for="estructura_puesto_id"> Puesto: </label>
            <select id="estructura_puesto_id" class="form-control " name="estructura_puesto_id">    
             <option value="0" disabled selected> - Seleccione - </option>              
             @forelse($estructuraPuestos as $elemento)                              
             <option value="{{ $elemento->id}}" {{ old('estructura_puesto_id') ==  
              $elemento->id ? 'selected' : '' }}> {{ $elemento->puesto}} 
             </option>
             @empty
             @endforelse
           </select> 
           @error('estructura_puesto_id') <span class="text-danger">{{ $message }} </span> @enderror
         </div>

          <div class="col-md-4 form-group">  
            <label for="estructura_puesto_tipo_id"> Tipo: </label>
            <select id="estructura_puesto_tipo_id" class="form-control " name="estructura_puesto_tipo_id">    
             <option value="0" disabled selected> - Seleccione - </option>              
             @forelse($estructuraPuestosTipos as $elemento)                              
             <option value="{{ $elemento->id}}" {{ old('estructura_puesto_tipo_id') ==  
              $elemento->id ? 'selected' : '' }}> {{ $elemento->tipo}} 
             </option>
             @empty
             @endforelse
           </select> 
           @error('estructura_puesto_id') <span class="text-danger">{{ $message }} </span> @enderror
         </div>
      </div>


       <div class="row ">

         <div class="col-md-4 form-group" id="divseccion">  
          <label for="seccione_id"> Secciòn: </label>
          <select id="seccione_id" class="form-control " name="seccione_id"> 
             <option value="0" disabled selected> - Seleccione - </option>   
                            
             @forelse($secciones as $elemento)                        
             <option value="{{ $elemento->seccione->id}}" {{$elemento->seccione->id == old('seccione_id') 
              ? 'selected' : ''}}> {{ $elemento->seccione->clave}} </option>                    
              @empty
              @endforelse
           
          </select> 
          @error('seccione_id') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>

        <div class="col-md-4 form-group" id="divtipo_casilla">  
          <label for="tipo_casilla_id"> Tipo Casilla: </label>
          <select id="tipo_casilla_id" class="form-control " name="tipo_casilla_id">   
            <option value="0" disabled selected> - Seleccione - </option>               
            @foreach($tiposCasilla as $elemento)    
            <option value="{{ $elemento->id}}" {{$elemento->id == 
              old('tipo_casilla_id') ? 'selected' : ''}}> {{ $elemento->tipo_casilla}} </option>
              @endforeach
            </select> 
          @error('tipo_casilla_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="col-md-4 form-group">  
            <label for="casilla"> Casilla: </label>        
            <select id="casilla" class="form-control" name="casilla" >
              @for($i = 1; $i <= 40; $i++)
              <option value="{{$i}}" {{$i == old('casilla') 
              ? 'selected' : ''}}> {{$i}} </option>                          
              @endfor
            </select> 
          </div>                    
      </div>

        <div class="form-group">  
          <input name="usuario_id" id="usuario_id" type="hidden" value="{{ $user_logueado->id }}">         
          
          <input class="form-control" type="hidden" name="municipio_clave" id="municipio_clave" value="{{ $municipio_clave }}" >       
          
          <input name="activo" id="activo"  value="1" type="hidden"> 
        </div>

      </div>


      <div class="row ">
        <legend>Datos Personales</legend>

        <div class="col-md-4 form-group">  
          <label for="apepat"> Apellido Paterno: </label>
          <input type="text"class="form-control" name="apepat" id="apepat" value="{{ old('apepat') }}">
          @error('apepat') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>

        <div class="col-md-4 form-group">  
          <label for="apemat"> Apellido Materno: </label>
          <input type="text"class="form-control" name="apemat" id="apemat" value="{{ old('apemat') }}">
          @error('apemat') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>


        <div class="col-md-4 form-group">  
          <label for="nombre"> Nombre: </label>
          <input type="text"class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
          @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>                   
      </div>

         

   <div class="row "> 
    
    <div class="col-md-6 form-group">  
      <label for="telefono_celular"> Telefono: </label>
      <input type="tel"class="form-control" name="telefono_celular" id="telefono_celular" value="{{ old('telefono_celular') }}">
      @error('telefono_celular') <span class="text-danger">{{ $message }}</span>@enderror  
    </div>


    <div class="col-md-6 form-group">  
      <label for="email"> Email: </label>
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"> 
      @error('email') <span class="text-danger">{{ $message }}</span>@enderror  
    </div>
                       
  </div>

  <div class="row">
        <div class="col-md-12 form-group">  
          <label for="direccion"> Direcciòn: </label>
          <textarea class="form-control" rows="2" name="direccion" id="direccion"> {{ old('direccion') }} </textarea>
          @error('direccion') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>
      </div>



  <div class="card-footer bg-transparent text-center">
   <a href="{{ route('estructuras.index') }}" class="btn btn-outline-danger"> Cancelar </a>
   
   <input class="btn btn-primary" type="button" value="Guardar" onclick="guardar()"> 
 </div>

</form>

</div>
</div>
</div>
@endsection

@section('js')



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="{{asset('vendor/jsvalidation/js/jsvalidation.js')}}"> </script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>



<!--
{!! JsValidator :: formRequest ('App\Http\Requests\StoreEstructurasRequest','#miform') !!}
-->






<script type="text/javascript">

  function guardar()
  {
      
   if ( $('#estructura_puesto_id').val() == null )
   {
    Swal.fire
    (
      'Debe seleccionar un Puesto para continuar',
      'Faltan datos...',
      'error'
      )
    return;        
  }  

  if ( $('#estructura_puesto_tipo_id').val() == null )
  {
    Swal.fire
    (
      'Debe seleccionar un Tipo de Puesto para continuar',
      'Faltan datos...',
      'error'
      )
    return;        
  } 

  if ( $('#seccione_id').val() == null )
  {
    Swal.fire
    (
      'Debe seleccionar una Sección para continuar',
      'Faltan datos...',
      'error'
      )
    return;        
  }  

  if ( $('#tipo_casilla_id').val() == null )
  {
    Swal.fire
    (
      'Debe seleccionar un Tipo de Casilla para continuar',
      'Faltan datos...',
      'error'
      )
    return;        
  }    
       
      $('#miform').submit();  
      Swal.fire
            (
              'Guardando Registro',    
              'Este mensaje se ocultará al concluir el proceso...',          
              'success'
            )  
  }
  


</script>



@endsection


