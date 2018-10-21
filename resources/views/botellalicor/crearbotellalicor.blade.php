@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">                
                    <ul class="nav nav-tabs">
                        <li><a href="{{ url('inicio') }}">Inicio</a></li>
                        <li><a href="{{ url('productos') }}">Productos</a></li>
                        <li class="active"><a href="{{ url('productos/create') }}">Ingresar Producto</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('productos') }}">
                        {!! csrf_field() !!}   
                        <div class="form-group">                                               
                            <label for="tipo" id="tipo" class="col-sm-2 control-label">Tipo Licor</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="Whiskey">Whiskey</option>
                                    <option value="Aguardiente">Aguardiente</option>
                                    <option value="Vodka">Vodka</option>
                                    <option value="Tequila">Tequila</option>
                                    <option value="Ron">Ron</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-sm-2 control-label">Decripción</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="marca" class="col-sm-2 control-label">Marca</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="marca" name="marca" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="codigo_b" class="col-sm-2 control-label">Codigo Producto <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="codigo_b" name="codigo_b" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="codigo_qrtapa" class="col-sm-2 control-label">Codigo Tapa <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="codigo_qrtapa" name="codigo_qrtapa"s>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button type="submit" class="btn btn-success">Ingresar Producto</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection