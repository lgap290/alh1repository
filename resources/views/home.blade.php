@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

	<div class="container spark-screen">
		<div class="row">

			<div class="col-md-4 col-sm-4 col-xs-10">
				<div class="info-box">
					<span class="info-box-icon bg-navy"><i class="ion ion-android-download"></i></span>
		
					<div class="info-box-content">
						<span class="info-box-text">Productos Registrados</span>
						<span class="info-box-number">{{$total_productos}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->

			<div class="col-md-3 col-sm-4 col-xs-10">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="ion ion-android-checkmark-circle"></i></span>
		
					<div class="info-box-content">
						<span class="info-box-text">Total Consultas</span>
						<span class="info-box-number">{{$total_consultas}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
				
			<div class="col-sm-3 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="ion ion-beer"></i></span>
		
					<div class="info-box-content">
					  	<span class="info-box-text">Consultas de hoy</span>
						<span class="info-box-number">{{$total_hoy}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		
			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>
		
		</div>
				
		<div class="row">
			<!-- /.col -->
			<div class="col-md-6">
			  <p class="text-center">
					<strong>Indicadores</strong>
			  </p>

			  <div class="progress-group">
					<span class="progress-text">Producto mas consultado: {{$product_best->marca}}</span>
					<span class="progress-number"><b>{{$product_best->total}}</b>/{{$total_consultas}}</span>

					<div class="progress sm">
						<div class="progress-bar progress-bar-aqua" style="width: {{$product_best->porcentaje}}%"></div>
					</div>
				</div>

				<!-- /.progress-group -->
				<div class="progress-group">
					<span class="progress-text">Producto mas Vendido: {{$product_max->marca}}</span>
					<span class="progress-number"><b>{{$product_max->total}}</b>/{{$total_productos}}</span>

					<div class="progress sm">
						<div class="progress-bar progress-bar-red" style="width: {{$product_max->porcentaje}}%"></div>
					</div>
				</div>

				<!-- /.progress-group -->
				<div class="progress-group">
					<span class="progress-text">Ciudad Mas consultada: {{$ciudad_max->ciudad}}</span>
					<span class="progress-number"><b>{{$ciudad_max->total}}</b>/{{$total_consultas}}</span>

					<div class="progress sm">
						<div class="progress-bar progress-bar-green" style="width: {{$ciudad_max->porcentaje}}%"></div>
					</div>
			  </div>
			</div>
			<!-- /.col -->
		</div>
		<div class="row">

				<div class="col-md-8">
		
						<div class="chart">
							<!-- Sales Chart Canvas -->
							<canvas id="salesChart" style="height: 180px; width: 647px;" width="647" height="180"></canvas>
						</div>
						<!-- /.chart-responsive -->
				</div>
				<div class="col-md-8">
		
						<div class="chart">
							<!-- Sales Chart Canvas -->
							<canvas id="salesChart2" style="height: 180px; width: 647px;" width="647" height="180"></canvas>
						</div>
						<!-- /.chart-responsive -->
				</div>
		</div>
		<script>
				var ctx = document.getElementById("salesChart");
				var salesChart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: ["Septiembre","Octubre","Noviembre", "Diciembre", "Enero", "Febrero", "Marzo"] ,
						datasets: [{
							label: 'Fecha',
							data: {{json_encode($graph->ejey)}},
							borderWidth: .3,
							borderColor: 'rgba(219, 32, 26, 1)'
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
										beginAtZero:true
								}
							}]
						},
						title: {
							display: true,
							text: 'Consultas por Fecha'
						}
					}
				});
				var ctx2 = document.getElementById("salesChart2");
				var salesChart2 = new Chart(ctx2, {
					type: 'bar',
					data: {
						labels: ["Bogota", "Boyaca", "Cali", "Medellín"],
						datasets: [{
							label: 'Consultas',
							data: {{json_encode($graph2->ejey)}},
							borderWidth: .3
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
										beginAtZero:true
								}
							}]
						},
						title: {
							display: true,
							text: 'Consultas por ciudad'
						}
					}
				});
			</script>
	</div>

	
@endsection