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
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Today's Sale</span>
                                <span class="info-box-number">{{ $today->sum('total') }} Taka</span>

                                @php
                                    $percentage = (($today->sum('total') - $yesterday->sum('total'))/ $yesterday->sum('total'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Yesterday
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Month's Sale</span>
                                <span class="info-box-number">{{ $month->sum('total') }} Taka</span>
                                @php
                                    $percentage = (($month->sum('total') - $previous_month->sum('total'))/ $previous_month->sum('total'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>
                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Month
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Year's Sale</span>
                                <span class="info-box-number">{{ $year->sum('total') }} Taka</span>
                                @php
                                    $percentage = (($year->sum('total') - $previous_year->sum('total'))/ $previous_year->sum('total'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>
                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Year
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Sale</span>
                                <span class="info-box-number">{{ $sales->sum('total') }} Taka</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                  70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Today's Paid</span>
                                <span class="info-box-number">{{ $today->sum('pay') }} Taka</span>
                                @php
                                    $percentage = (($today->sum('pay') - $yesterday->sum('pay'))/ $yesterday->sum('pay'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Yesterday
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Month's Paid</span>
                                <span class="info-box-number">{{ $month->sum('pay') }} Taka</span>
                                @php
                                    $percentage = (($month->sum('pay') - $previous_month->sum('pay'))/ $previous_month->sum('pay'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Month
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Year's Paid</span>
                                <span class="info-box-number">{{ $year->sum('pay') }} Taka</span>
                                @php
                                    $percentage = (($year->sum('pay') - $previous_year->sum('pay'))/ $previous_year->sum('pay'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Year
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Paid</span>
                                <span class="info-box-number">{{ $sales->sum('pay') }} Taka</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                  70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Today's Due</span>
                                <span class="info-box-number">{{ $today->sum('due') }} Taka</span>
                                @php
                                    $percentage = (($today->sum('due') - $yesterday->sum('due'))/ $yesterday->sum('due'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Yesterday
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Month's Due</span>
                                <span class="info-box-number">{{ $month->sum('due') }} Taka</span>
                                @php
                                    $percentage = (($month->sum('due') - $previous_month->sum('due'))/ $previous_month->sum('due'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Month
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Year's Due</span>
                                <span class="info-box-number">{{ $year->sum('due') }} Taka</span>
                                @php
                                    $percentage = (($year->sum('due') - $previous_year->sum('due'))/ $previous_year->sum('due'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Year
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Due</span>
                                <span class="info-box-number">{{ $sales->sum('due') }} Taka</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                  70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Today's Expenses</span>
                                <span class="info-box-number">{{ $today_expenses->sum('amount') }} Taka</span>

                                @php
                                    $percentage = (($today_expenses->sum('amount') - $yesterday_expenses->sum('amount'))/ $yesterday_expenses->sum('amount'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{  number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Yesterday
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Month's Expenses</span>
                                <span class="info-box-number">{{ $month_expenses->sum('amount') }} Taka</span>
                                @php
                                    $percentage = (($today_expenses->sum('amount') - $yesterday_expenses->sum('amount'))/ $yesterday_expenses->sum('amount'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage < 0 ? 'text-success' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Month
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">This Year's Expenses</span>
                                <span class="info-box-number">{{ $year_expenses->sum('amount') }} Taka</span>
                                @php
                                    $percentage = (($year_expenses->sum('amount') - $previous_year_expenses->sum('amount'))/ $previous_year_expenses->sum('amount'))*100;
                                @endphp

                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ number_format(abs($percentage), 2) }}%"></div>
                                </div>

                                <span class="progress-description {{ $percentage > 0 ? 'text-warning' : '' }}">
                                  {{ number_format(abs($percentage), 2) }} % {{ $percentage > 0 ? 'Increase' : 'Decrease' }} From Previous Year
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Expenses</span>
                                <span class="info-box-number">{{ $expenses->sum('amount') }} Taka</span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                                  70% Increase in 30 Days
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
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
					<div class="col-md-6">
						<!-- AREA CHART -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Expenses Report</h3>
							</div>
							<div class="card-body">
								<div class="chart">
									<div id="barchart_material2" style="width: 900px; height: 500px;"></div>
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
				legend: { position: 'in'},
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material'));

			chart.draw(data, google.charts.Bar.convertOptions(options));
		}
	</script>

	<script type="text/javascript">
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Months', '2019 Expenses', '2018 Expenses'],
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
					title: 'Company Expenses Report',
					subtitle: 'Expenses report by months in last two years',
				},
				width: 750,
				bars: 'vertical', // Required for Material Bar Charts.
				series: {
					0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
					1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
				},
				legend: { position: 'left'},
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material2'));

			chart.draw(data, google.charts.Bar.convertOptions(options));
		}
	</script>


@endpush