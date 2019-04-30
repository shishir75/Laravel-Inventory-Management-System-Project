@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')


@endpush

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Dashboard</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<!-- AREA CHART -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Sales Report</h3>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="barchart_material" style="width: 900px; height: 500px;"></div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

@endsection

@push('js')
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Months', '2019 Sales', '2018 Sales'],
				['Jan', 1000, 900],
				['Feb', 1170, 1060],
				['March', 660, 1120],
				['May', 1030, 540],
				['June', 1000, 610],
				['July', 840, 780],
				['August', 1210, 1445],
				['Sept', 1070, 1150],
				['Oct', 962, 782],
				['Nov', 750, 440],
				['Dec', 1358, 1720],
			]);

			var options = {
				chart: {
					title: 'Company Sales Report',
					subtitle: 'Sales report by months in last two years',
				},
				width: 750,
				bars: 'vertical', // Required for Material Bar Charts.
				series: {
					0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
					1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
				},
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material'));

			chart.draw(data, google.charts.Bar.convertOptions(options));
		}
	</script>


@endpush