@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">                
                    <ul class="nav nav-tabs">
                        <li><a href="{{ url('inicio') }}">Inicio</a></li>
                        <li class="active"><a href="{{ url('productos') }}">Productos</a></li>
                        <li><a href="{{ url('productos/create') }}">Ingresar Producto</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                <p class="text-info bg-info">{{$respuestaenvio}}</p>                
                    <table class="table table-hover">
                        <thead>
                            <tr>                                
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Marca</th>
                                <th>Codigo Barras</th>
                                <th>Codigo Tapa</th>
                                <th>Estado</th>
                                <th>N Consultas</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($botellaslicor as $botellalicor)
                        <tr>
                            <td>{{$botellalicor->tipo}}</td>
                            <td>{{$botellalicor->descripcion}}</td>
                            <td>{{$botellalicor->marca}}</td>
                            <td>{{$botellalicor->codigo_b}}</td>
                            <td>{{$botellalicor->tapa->codigo_qr}}</td>
                            @if($botellalicor->tapa->fecha_abierta!='0000-00-00 00:00:00')
                            <td class="text-success bg-success">Abierta</td>
                            @else
                            <td class="text-danger bg-danger">En venta</td>
                            @endif
                            <td align="center">{{$botellalicor->n_consultas}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

