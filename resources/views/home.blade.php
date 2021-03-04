@extends('adminlte::page')

@section('title', '' )

@section('content_header')
    <h1></h1>
@stop

@section('plugins.Sweetalert2',true)

@section('auth_header')
 <h3 class="card-body float-none text-center"> hola </h3>
 @endsection

@section('content')
 

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">      
@stop

@section('js')   
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

@stop

@section('adminlte_js')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

 @stop
