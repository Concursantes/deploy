@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

@endsection







@section('content')

 
<div class="container">  
  <div class="card" style="width: 60rem text-align: center;">
    <div class="card-header text-center">
      <h4> Modificar Estructura </h4>
    </div>

    <div class="card-body"> 

      <form method="POST" action="{{ route('estructuras.update', ['estructura'=>$items->id]) }}" class="form" id="miform" >
        @method('PATCH')
        @csrf

        <div class="row ">
          <legend>Datos Basicos</legend>



          <div class="col-md-3 form-group">  
            <label for="identificador"> Identificador: </label>
            <input type="text" class="form-control pull-right" name="identificador" id="identificador" value="{{ old('identificador') ? old('identificador') : $items->identificador }}" autofocus="">
            <i class="fa fa-pencil"> </i>
            @error('identificador') <span class="text-danger"> {{ $message }}  </span>@enderror  
          </div>



          <div class="col-md-2 form-group">  
            <label for="vigencia_identificador"> Vigencia: </label>        
            <select id="vigencia_identificador" class="form-control" name="vigencia_identificador" >
              @for($i = 2021; $i <= 2031; $i++)
              <option value="{{$i}}" {{ old('vigencia_identificador') == $i ? 'selected' : $items->vigencia_identificador == $i && old('vigencia_identificador') == null ? 'selected' : ''}}> {{$i}} </option>                          
             
              @endfor
            </select> 
             @error('vigencia_identificador') <span class="invalid-feedback" level="alert"> <strong> {{ $message }} </strong> </span>@enderror  
          </div>                    



          <div class="col-md-4 form-group">  
            <label for="estructura_puesto_id"> Puesto: </label>
            <select id="estructura_puesto_id" class="form-control" name="estructura_puesto_id" disabled >
               
             @forelse($estructuraPuestos as $elemento)                              
             <option value="{{ $elemento->id}}" {{ old('estructura_puesto_id') == $elemento->id ? 'selected' : $items->estructura_puesto_id == $elemento->id && old('estructura_puesto_id') == null ? 'selected' : ''}}> {{ $elemento->puesto}} 
             </option>
             @empty
             @endforelse
           </select> 
           @error('estructura_puesto_id') <span class="text-danger">{{ $message }} </span> @enderror
         </div>


<!--
id="divseccion"
-->
@if($items->estructura_puesto_id >= 50)
         <div class="col-md-3 form-group" id="divseccion" name="divseccion">  
          <label for="seccione_id"> Secciòn: </label>
          <select id="seccione_id" class="form-control " name="seccione_id" disabled> 
              <option value="0" disabled selected> NO APLICA </option>              
                @forelse ($secciones as $elemento) 
                        <option value="{{ $elemento->seccione->id}}" {{old('seccione_id') == $elemento->seccione->id ? 'selected' : $items->seccione_id == $elemento->seccione->id && old('seccione_id') == null ? 'selected' : ''}}> {{ $elemento->seccione->clave}} </option>
                @empty
                @endforelse
            
          </select> 
          @error('seccione_id') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>


@elseif($items->estructura_puesto_id == 40)
        <div class="col-md-3 form-group" id="divzona" name="divzona">  
          <label for="zona"> Zona: </label>
          <select id="zona" class="form-control " name="zona" disabled>   
              <option value="0" disabled selected> NO APLICA </option>              
            @if(isset($estructuraZonas))                   
                @foreach($estructuraZonas as $elemento)                       
                        <option value="{{ $elemento->zonas->id}}" {{old('zona') == $elemento->zonas->id ? 'selected' : $items->zona == $elemento->zonas->id && old('zona') == null ? 'selected' : ''}}> {{ $elemento->zonas->descripcion}} </option>
                @endforeach
            @endif
          </select> 
          @error('zona') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
@elseif($items->estructura_puesto_id == 30)
        <div class="col-md-3 form-group" name="divarea" id="divarea">  
          <label for="area"> Area: </label>
          <select id="area" class="form-control " name="area" disabled>   
                   <option value="0" disabled selected> NO APLICA </option>              
            @foreach($estructuraAreas as $elemento)    
            <option value="{{ $elemento->id}}" {{ old('area') == $elemento->id ? 'selected' : $items->area == $elemento->id && old('area') == null ? 'selected' : ''}}> {{ $elemento->descripcion}} </option>
            @endforeach
          </select> 
          @error('area') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
@endif

        <div class="form-group">  

          <input name="usuario_id" id="usuario_id" type="hidden" value="{{ $user_logueado->id }}"> 
         
          
          <input type="hidden" class="form-control" name="edad" id="edad" value="{{ old('edad') ? old('edad') : $items->edad }}" placeholder="edad" >

          
        </div>
      </div>


      <div class="row ">
        <legend>Datos Personales</legend>

        <div class="col-md-4 form-group">  
          <label for="apepat"> Apellido Paterno: </label>
          <input type="text"class="form-control" name="apepat" id="apepat" value="{{ old('apepat') ? old('apepat') : $items->apepat}}">
          {{old('apepat')}}
          @error('apepat') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>

        <div class="col-md-4 form-group">  
          <label for="apemat"> Apellido Materno: </label>
          <input type="text"class="form-control" name="apemat" id="apemat" value="{{ old('apemat') ? old('apemat') : $items->apemat}}">
          @error('apemat') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>


        <div class="col-md-4 form-group">  
          <label for="nombre"> Nombre: </label>
          <input type="text"class="form-control" name="nombre" id="nombre" value="{{ old('nombre') ? old('nombre') : $items->nombre}}">
          @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>                   
      </div>

      <div class="row ">                   

        <div class="col-md-5 form-group">  
          <label for="fecha_nacimiento"> Fecha de Nacimiento: </label>
          <input type="date"class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') ? old('fecha_nacimiento') : $items->fecha_nacimiento}}" >
          @error('fecha_nacimiento') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>

        <div class="col-md-2 form-group">  
          <label for="edad_form"> Edad: </label>
          <input type="text"class="form-control" name="edad_form" id="edad_form" value="{{ old('edad') ? old('edad') : $items->edad }}" disabled="">
          @error('edad') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

         <div class="col-md-5 form-group">  
          <label for="sexo"> Sexo: </label>     
          <select id="sexo" class="form-control" name="sexo">
            <option value="M" {{ old('sexo') == "M" ? 'selected' : $items->sexo == "M" && old('sexo') == null ? 'selected' : ''}}> MASCULINO </option>                        
             <option value="F" {{ old('sexo') == "F" ? 'selected' : $items->sexo == "F" && old('sexo') == null ? 'selected' : ''}}> FEMENINO </option>                      
          </select> 
          @error('sexo') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>
       

      </div>
      <div class="row ">
        <div class="col-md-12 form-group">  
          <label for="direccion"> Direcciòn: </label>
          <textarea class="form-control" rows="2" name="direccion" id="direccion"> {{ old('direccion') ? old('direccion') : $items->direccion }} </textarea>
          @error('direccion') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>


      </div>

      <div class="row ">  
        <div class="col-md-2 form-group">  
          <label for="numero"> Nùmero Exterior: </label>
          <input type="text" class="form-control" name="numero" id="numero" value="{{ old('numero') ? old('numero') : $items->numero }}"> 
          @error('numero') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>




        <div class="col-md-2 form-group">  
          <label for="codigo_postal"> Código Postal: </label>     
          <select id="codigo_postal" class="form-control " name="codigo_postal">
            
            @foreach($codigos_postales as $elemento)    
            <option value="{{ $elemento->id}}" {{ old('codigo_postal') == $elemento->id ? 'selected' : $items->codigo_postal == $elemento->id && old('codigo_postal') == null ? 'selected' : ''}} > {{ $elemento->codigo_postal}} </option>
            @endforeach               
          </select> 
          @error('codigo_postal') <span class="text-danger">{{ $message }}</span>@enderror  
        </div>




        <div class="col-md-4 form-group">  
          <label for="estado_id"> Estado: </label>
          <select id="estado_id" class="form-control" name="estado_id" disabled>                  
           @forelse($estados as $elemento)    
           <option value="{{ $elemento->id}}"> {{ $elemento->nombre}} </option>
           @empty
           @endforelse
         </select> 
         @error('estado_id') <span class="text-danger">{{ $message }}</span>@enderror
       </div>

       <div class="col-md-4 form-group">  
        <label for="municipio_id"> Municipio: </label>
        <select id="municipio_id" class="form-control" name="municipio_id" disabled>                  
         @forelse($municipios as $elemento)    
         <option value="{{ $elemento->id}}"> {{ $elemento->nombre}} </option>
          @empty
           @endforelse
       </select> 
       @error('municipio_id') <span class="text-danger">{{ $message }}</span>@enderror
     </div>

   </div>

   <div class="row "> 

    <div class="col-md-3 form-group">  
      <label for="colonia_id"> Colonia: </label>
      <select id="colonia_id" class="form-control " name="colonia_id">   
       
        @foreach($colonias as $elemento)    
        <option value="{{ $elemento->id}}" {{ old('colonia_id') == $elemento->id ? 'selected' : $items->colonia_id == $elemento->id && old('colonia_id') == null ? 'selected' : ''}}> {{ $elemento->nombre}} </option>
        @endforeach
      </select> 
      @error('colonia_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="col-md-3 form-group">  
      <label for="telefono_celular"> Telefono: </label>
      <input type="tel"class="form-control" name="telefono_celular" id="telefono_celular" value="{{ old('telefono_celular') ? old('telefono_celular') : $items->telefono_celular }}">
      @error('telefono_celular') <span class="text-danger">{{ $message }}</span>@enderror  
    </div>


    <div class="col-md-3 form-group">  
      <label for="email"> Email: </label>
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ? old('email') : $items->email }}"> 
      @error('email') <span class="text-danger">{{ $message }}</span>@enderror  
    </div>
    <div class="col-md-3 form-group">  
      <label for="facebook"> Facebook: </label>
      <input type="text" class="form-control" name="facebook" id="facebook" value="{{ old('facebook') ? old('facebook') : $items->facebook }}"> 
      @error('facebook') <span class="text-danger">{{ $message }}</span>@enderror  
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
{!! JsValidator :: formRequest ('App\Http\Requests\UpdateEstructurasRequest','#miform') !!}
-->


<script type="text/javascript">

  function guardar()
  {
      $('#miform').submit();  
      Swal.fire
            (
              'Actualizando Registro',    
              'Este mensaje se ocultarà al concluir el proceso...',          
              'success'
            )  
  }
  

</script>


<script>   
/*

 function habilitar() {        
         
          if($('#puesto_tempo').val() == 30)
          {
            $("#divarea").show();
            $("#divzona").hide();
            $("#divseccion").hide();         
          }

          if($('#puesto_tempo').val() == 40)
          {
            $("#divarea").hide();
            $("#divzona").show();
            $("#divseccion").hide();         
          }
          if($('#puesto_tempo').val() == 50 || $('#puesto_tempo').val() == 60 || $('#puesto_tempo').val() == 70)
          {            
            $("#divarea").hide();
            $("#divzona").hide();
            $("#divseccion").show();
          }
         
  }
 */
 
  </script>


  
<script>
  /*
         $('#estructura_puesto_id').on('change', function ()
         {  
           
              $('#puesto_tempo').val( $('#estructura_puesto_id').val() );
              $('#identificador').focus();
              $('#estructura_puesto_id').focus();
         });
*/
</script>

<script type="text/javascript">
  var _edad;    
  $('#fecha_nacimiento').on('change', function ()
  {   
    _edad = $(this).val();        
    var hoy = new Date();
    var cumpleanos = new Date(_edad);        
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();        
    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) 
    {
      edad--;            
    }          
    $("#edad").val(edad);  
    $("#edad_form").val(edad);  
  });           
</script>


@endsection


