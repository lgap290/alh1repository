@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
		
					<div class="info-box-content">
					  <span class="info-box-text">CPU Traffic</span>
					  <span class="info-box-number">90<small>%</small></span>
					</div>
					<!-- /.info-box-content -->
				  </div>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
		
					<div class="info-box-content">
					  <span class="info-box-text">Likes</span>
					  <span class="info-box-number">41,410</span>
					</div>
					<!-- /.info-box-content -->
				  </div>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->
		
				<!-- fix for small devices only -->
				<div class="clearfix visible-sm-block"></div>
		
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box">
					<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
		
					<div class="info-box-content">
					  <span class="info-box-text">Sales</span>
					  <span class="info-box-number">760</span>
					</div>
					<!-- /.info-box-content -->
				  </div>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
				  <div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
		
					<div class="info-box-content">
					  <span class="info-box-text">New Members</span>
					  <span class="info-box-number">2,000</span>
					</div>
					<!-- /.info-box-content -->
				  </div>
				  <!-- /.info-box -->
				</div>
				<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-md-8">
			  <p class="text-center">
				<strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
			  </p>

			  <div class="chart">
				<!-- Sales Chart Canvas -->
				<canvas id="salesChart" style="height: 180px; width: 647px;" width="647" height="180"></canvas>
			  </div>
			  <!-- /.chart-responsive -->
			</div>
			<!-- /.col -->
			<div class="col-md-4">
			  <p class="text-center">
				<strong>Goal Completion</strong>
			  </p>

			  <div class="progress-group">
				<span class="progress-text">Add Products to Cart</span>
				<span class="progress-number"><b>160</b>/200</span>

				<div class="progress sm">
				  <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
				</div>
			  </div>
			  <!-- /.progress-group -->
			  <div class="progress-group">
				<span class="progress-text">Complete Purchase</span>
				<span class="progress-number"><b>310</b>/400</span>

				<div class="progress sm">
				  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
				</div>
			  </div>
			  <!-- /.progress-group -->
			  <div class="progress-group">
				<span class="progress-text">Visit Premium Page</span>
				<span class="progress-number"><b>480</b>/800</span>

				<div class="progress sm">
				  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
				</div>
			  </div>
			  <!-- /.progress-group -->
			  <div class="progress-group">
				<span class="progress-text">Send Inquiries</span>
				<span class="progress-number"><b>250</b>/500</span>

				<div class="progress sm">
				  <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
				</div>
			  </div>
			  <!-- /.progress-group -->
			</div>
			<!-- /.col -->
		  </div>
	</div>
@endsection
