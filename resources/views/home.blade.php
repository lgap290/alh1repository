@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-10">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
		
					<div class="info-box-content">
						<span class="info-box-text">Total Consultas</span>
						<span class="info-box-number">{{$total}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
				
			<div class="col-sm-5 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>
		
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
			<div class="col-md-6">
			  <p class="text-center">
				<strong>Consultas: Mayo, 2018 a Hoy</strong>
			  </p>

			  <div class="chart">
					<!-- Sales Chart Canvas -->
					<canvas id="salesChart" style="height: 180px; width: 647px;" width="647" height="180"></canvas>
			  </div>

			  <div class="chart">
					<!-- Sales Chart Canvas -->
					<canvas id="salesChart2" style="height: 180px; width: 647px;" width="647" height="180"></canvas>
			  </div>
			  <!-- /.chart-responsive -->
			</div>


			<!-- /.col -->
			<div class="col-md-4">
			  <p class="text-center">
					<strong>Metas</strong>
			  </p>

			  <div class="progress-group">
				<span class="progress-text">Producto mas consultado: Whiskey</span>
				<span class="progress-number"><b>160</b>/200</span>

				<div class="progress sm">
				  <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
				</div>
			  </div>
			  <!-- /.progress-group -->
			  <div class="progress-group">
				<span class="progress-text">Producto mas Vendido: Aguardiente</span>
				<span class="progress-number"><b>310</b>/400</span>

				<div class="progress sm">
				  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
				</div>
			  </div>
			  <!-- /.progress-group -->
			  <div class="progress-group">
				<span class="progress-text">Ciudad Mas consultada: Bogota</span>
				<span class="progress-number"><b>480</b>/800</span>

				<div class="progress sm">
				  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
				</div>
			  </div>
			</div>
			<!-- /.col -->
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
							text: 'Por Mes'
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
							text: 'Por ciudad'
						}
					}
				});
			</script>
	</div>

	
@endsection