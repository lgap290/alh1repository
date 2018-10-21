@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">                
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="{{ url('inicio') }}">Inicio</a></li>
                        <li><a href="{{ url('productos') }}">Productos</a></li>
                        <li><a href="{{ url('productos/create') }}">Ingresar Producto</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                 <p>Descarga el apk para hacer uso completo de la alicación web:</p>
                 <a href="../resources/download/alcoholegalapp-release.apk">alcoholegalapp-release.apk</a>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
