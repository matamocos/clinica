@extends('layouts.template') @section('content')
<html>

<head>
	
	</style>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {
			'packages': ['corechart']
		});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Pacientes', 'Edades'],
				@foreach($paciente as $p)
				['{{$p->edad_paciente}} {{trans('inicio.anyos')}}', {{$p->edad_paciente}}],
				@endforeach
			]);
			var options = {
				title: '{{trans('inicio.demografia')}}',
				is3D: false,
				width: 750,
  				height: 750,
			};
			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
		}
	</script>
</head>

<body>
	<h2 class="section-title" style="margin-top: 0;">{{ trans('template.estadisticas') }}</h2>
	<div id="piechart"></div>
</body>

</html>

<div>

</div>

@endsection