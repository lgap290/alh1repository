@extends('layouts.app')

@section('main-content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-xs-10">
            <div class="panel panel-default">
                <div class="panel-body">
                <p class="text-info bg-info">{{$respuestaenvio}}</p>                
                    <table class="table table-hover">
                        <thead>
                            <tr>                                
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Marca</th>
                                <th>Codigo</th>
                                {{-- <th>Codigo Tapa</th> --}}
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
                            {{-- <td>{{$botellalicor->tapa->codigo_qr}}</td> --}}
                            @if($botellalicor->tapa->fecha_abierta!='0000-00-00 00:00:00')
                            <td class="text-success bg-success">Abierta</td>
                            @else
                            <td class="text-danger bg-danger">En venta</td>
                            @endif
                            <td>{{$botellalicor->n_consultas}}</td>
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

