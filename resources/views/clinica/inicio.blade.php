@extends('layouts.template') @section('content')

<h2 class="section-title" style="margin-top: 0">{{trans('inicio.inicio')}}</h2>

<html>

<head>
	
	<style>
		g{
			background: -webkit-linear-gradient(black, #5d49be);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		
		.graficas-wrapper{
			box-shadow: 10px 10px 30px 10px rgba(0,0,0,0.5);
			border-top: 5px solid #5d49be;
			min-height: 900px;
		}
		
		.graficas{
			display: grid;
			width: 100%;
			grid-template-columns: repeat(2, 1fr);	
		}
		
		.graficas > div{
			height: 300px;
			width: 100%;
		}
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
	<div class="graficas-wrapper">
		<h3 class="section-title" style="margin-top: 0; padding: 1em;">{{trans('inicio.estadistica')}}</h3>
		<div class="graficas">
			<div id="piechart"></div>
			<div></div>
		</div>
		
	</div>
	
</body>

</html>

<div>

</div>

@endsection