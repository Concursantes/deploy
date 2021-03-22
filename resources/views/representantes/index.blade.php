@extends('adminlte::page')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
@endsection


@section('content_header')

<div class="container">
  <div class="row ">
    <div class="col-lg-10 text-center ">
      <h1><strong>Detallado de Representantes </strong></h1>           
    </div>   
  </div>

  <div class="row text-center">  
    <div class="col-lg-10 text-center">  
     @can('representantes.create')
     <a href="{{ route('representantes.create') }}" class="btn btn-outline-info py-0 text-center "> Nuevo </a>  
     @endcan
   </div>
 </div>
</div>

@endsection


@section('content')

<div class="panel panel-info padre">

  <div class="table-responsive">
    <table id="despliegue" class="table  table-hover btn-table" style="width:100%">

     <thead class="secondary">
      <tr class="table text-center table-secondary">
       <th class="text-center align-middle"> ID </th> 
       <th class="text-center align-middle"> Apellido Paterno </th>            
       <th class="text-center align-middle"> Apellido Materno </th> 
       <th class="text-center align-middle"> Nombre </th>       
       <th class="text-center align-middle"> Telefono </th>    
       <th class="text-center align-middle"> Puesto </th>
       <th class="text-center align-middle"> Tipo </th>
       <th class="text-center align-middle"> Sección </th>       
       <th class="text-center align-middle"> Casilla </th>
       <th class="text-center align-middle"> Acciones </th>       
     </tr>					
   </thead>

   <tbody>

    @forelse($items as $item)
    <tr> 
     <td class="text-center align-middle"> {{ $item->id }} </td>
     <td class="text-center align-middle"> {{ $item->apepat}} </td>
     <td class="text-center align-middle"> {{ $item->apemat}} </td>
     <td class="text-center align-middle"> {{ $item->nombre }} </td>
     <td class="text-center align-middle"> {{ $item->telefono_celular }} </td>   
    
     <td class="text-center align-middle">

      @if($item->estructura_puesto_id == 20)              
      <span class="badge bg-green"> Sección </span>

      @elseif($item->estructura_puesto_id == 30)         
      <span class="badge bg-red"> Area </span> 

      @else
      <span class="badge bg-orange"> Zona </span>   

      @endif

    </td>   


     <td class="text-center align-middle"> {{ $item->estructurapuestotipo->tipo }} </td>  
     <td class="text-center align-middle"> {{ $item->seccione->clave }} </td>  
     <td class="text-center align-middle"> {{ $item->tipocasilla->tipo_casilla }} . ' ' . {{ $item->tipocasilla->casilla }}</td>  

    <td class="text-center align-middle"> 

 <div class="btn-group btn-group-sm d-flex h-100">
  
  @can('representantes.edit')
  <a href="{{ route('representantes.edit', ['representante'=>$item->id]) }}" class="btn btn-outline-info py-0 "> Actualizar Datos </a>	
  @endcan

</div>

</td>
</tr>
@empty
@endforelse
</tbody>
</table>
</div>
</div>

</div>




























<div class="col-md-12" hidden="">
  <div class="card">
    <div class="card-body p-0">
      <ul class="nav nav-tabs profile-tab" role="tablist">
        <li class="nav-item nav-item-level" style="width: 16.6%;">
          <a class="nav-link  update-url" data-toggle="tab" href="#typeOfRequest-1" role="tab" aria-selected="true" query-key="typeOfRequest" query-value="" reload="">
            <span class="hidden-sm-up">
            </span> <span class="hidden-xs-down">TODOS</span>
          </a>
        </li>
        <li class="nav-item nav-item-level" style="width: 16.6%;">
          <a class="nav-link  update-url" data-toggle="tab" href="#typeOfRequest-1" role="tab" aria-selected="true" query-key="typeOfRequest" query-value="blackpoint" reload="">
            <span class="hidden-sm-up">
            </span> <span class="hidden-xs-down">SOLICITUD </span>
          </a>
        </li>
        <li class="nav-item nav-item-level" style="width: 16.6%;">
          <a class="nav-link active update-url" data-toggle="tab" href="#typeOfRequest-2" role="tab" aria-selected="false" query-key="typeOfRequest" query-value="role" reload="">
            <span class="hidden-sm-up">
            </span> <span class="hidden-xs-down">SOLICITUD ROL</span>
          </a>
        </li>
        <li class="nav-item nav-item-level" style="width: 16.6%;">
          <a class="nav-link  update-url" data-toggle="tab" href="#typeOfRequest-2" role="tab" aria-selected="false" query-key="typeOfRequest" query-value="bp-accepted" reload="">
            <span class="hidden-sm-up"></span>
            <span class="hidden-xs-down badge badge-dark">INCRITOS A BP</span>
          </a>
        </li>
        <li class="nav-item nav-item-level" style="width: 16.6%;">
          <a class="nav-link  update-url" data-toggle="tab" href="#typeOfRequest-2" role="tab" aria-selected="false" query-key="typeOfRequest" query-value="bp-birthday" reload="">
            <span class="hidden-sm-up"></span>
            <span class="hidden-xs-down">
              <i class="fa fa-birthday-cake" aria-hidden="true"></i>
              &nbsp; CUMPLEAÑEROS
            </span>
          </a>
        </li>
        <li class="nav-item nav-item-level" style="width: 16.6%;">
          <a class="nav-link  update-url" data-toggle="tab" href="#typeOfRequest-2" role="tab" aria-selected="false" query-key="typeOfRequest" query-value="bp-suspended" reload="">
            <span class="hidden-sm-up"></span>
            <span class="hidden-xs-down">
              <!-- <i class="fa fa-birthday-cake"></i> -->
              SUSPENDER
            </span>
          </a>
        </li>
      </ul>
    </div>
    <div class="card-header p-l-0 p-r-0">
      <form id="contentFields" class="floating-labels m-t-10 form-filtro" tab-index-count="7">
        <input name="typeOfRequest" type="hidden" value="role" tabindex="-1">
        <table>
          <thead>
            <tr>
              <th>
                <div class="form-group">TODOS</small></label>
                  <input type="text" class="form-control form-control-sm" name="mg_id" value="" tabindex="1">
                  <span class="bar"></span>
                </div>
              </th>
              
               
               
              </th>
            </tr>
          </thead>
        </table>
        <input type="hidden" name="action" value="" tabindex="-1">
        <input type="hidden" name="publication" value="" tabindex="-1">
      </form>
      <!-- <hr> -->
    </div>
    
    
    </div>


@endsection


<!--
    <div class="container pagination pagination-centered">
      <small class="container">
        Mostrando de {{ $items->firstItem() }} a {{ $items->lastItem() }}
        de un total de <strong>{{ $items->total() }}</strong> registros 
      </small>      
      {{ $items->withQueryString()->links() }}    
    </div>
  -->    
  @section('js')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>



    <script type="text/javascript">

      $(document).ready(function () 
      {



        oTable = $('#despliegue').DataTable
        (
        {
         "pagingType": "simple_numbers",
         "ordering": true, // false to disable sorting (or any other option)
         "searching": true,

         "pageLength": 10, 

         "order": [[ 0, "asc" ]], 
         "columnDefs": [ 
         { 
           "targets": [ 0 ], 
           "visible": false, 
           "searchable": false
         }, 
         { 
           "targets": [ 1 ], 
           "visible": true, 
           "searchable": true 
         }, 
         { 
           "targets": [ 2 ], 
           "visible": true, 
           "searchable": true 
         },
         { 
           "targets": [ 3 ], 
           "visible": true, 
           "searchable": true 
         },
         { 
           "targets": [ 4 ], 
           "visible": true, 
           "searchable": false 
         },  
         { 
           "targets": [ 5 ], 
           "visible": true, 
           "searchable": true 
         },  
         { 
           "targets": [ 6 ], 
           "visible": true, 
           "searchable": true 
         },
         { 
           "targets": [ 7 ], 
           "visible": true, 
           "searchable": true 
         },
         { 
           "targets": [ 8 ], 
           "visible": true, 
           "searchable": true 
         },
         { 
           "targets": [ 9 ], 
           "visible": true, 
           "searchable": false 
         }
         ],
         "lengthMenu": [10, 25, 50, 100],


         "language": {
          "lengthMenu": "Desplegar _MENU_ registros por página",
          "zeroRecords": "Ningún registro encontrado",
          "info": "Mostrando _PAGE_ de un total de _PAGES_ páginas",
          "infoEmpty": "No existen registros ",
          "infoFiltered": "",
          "search":"Búsqueda",
           "paginate": 
              {
                "first":"Primero",
                "last":"Último",
                "next":"Siguiente",
                "previous":"Anterior"
              }       

        }
      });
        $('.dataTables_length').addClass('bs-select');

        
      });
  
  </script>

    <script>
     

     
       
       
      //$(this).css("background-color", "#078DC6"); 
    </script>

    @endsection

   

<style>
  .padre {
    background-color: #fafafa;
    margin: 0rem;
    padding: 1rem;
    border: 1px solid #ccc;
    /* IMPORTANTE */
    text-align: center;
</style>

  

 



