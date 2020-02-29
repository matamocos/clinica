<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Clínica</title>
</head>

	<!-- STYLESHEETS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<link rel="stylesheet" href="{{ asset('/assets/css/template.css',true)}}">
	
	<!-- SCRIPTS -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script src="{{ asset('/assets/js/redirecciones.js',true)}}"></script>
	<script src="{{ asset('/assets/js/scroll.js',true)}}"></script>
	<script src="{{ asset('/assets/js/search.js',true)}}"></script>
	<script src="{{ asset('/assets/js/clear.js',true)}}"></script>
	<script src="{{ asset('/assets/js/delete.js',true)}}"></script>
	<script src="{{ asset('/assets/js/delete-checkbox.js',true)}}"></script>
	<script src="{{ asset('/assets/js/edit.js',true)}}"></script>
	<script src="{{ asset('/assets/js/show-citas.js',true)}}"></script>
	<script src="{{ asset('/assets/js/show-medicos.js',true)}}"></script>
	<script src="{{ asset('/assets/js/show-pacientes.js',true)}}"></script>
	<script src="{{ asset('/assets/js/show-tratamientos.js',true)}}"></script>

	<!-- VANTA JS ASSETS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
	<script src="https://www.vantajs.com/dist/vanta.net.min.js"></script>
	
<body>

	<div class="wrapper">

		<!-- BANNER -->
		<div id="vanta-banner" class="banner"></div>

			<!-- NAVBAR -->
			<div class="navbar">
				<div class="ui inverted segment" style="border-radius: 0; background-image: linear-gradient(to right, black, #5d49be);">
				  	<div class="ui inverted secondary pointing menu">
				    	<a class="item" href="{{url('/inicio')}}">{{ trans('template.inicio') }}</a>
					    <a class="item" href="{{url('/pacientes')}}">{{ trans('template.paciente') }}</a>
					    <a class="item" href="{{url('/medicos')}}">{{ trans('template.medico') }}</a>
					    <a class="item" href="{{url('/citas')}}">{{ trans('template.cita') }}</a>
						<a class="item" href="{{url('/tratamientos')}}">{{ trans('template.tratamiento') }}</a>
					    <a class="item" href="{{url('/tratamientos_tipos')}}">{{ trans('template.t_tratamiento') }}</a>
						<a class="item" href="{{url('/especialidades')}}">{{ trans('template.especialidad') }}</a>
						
						<div class="item right">
							
	
							<!-- IDIOMA -->
							<div class="ui dropdown">
								<input class="test" type="hidden">
								<i class="dropdown icon"></i>
								<div class="default text">{{ trans('template.idioma') }}</div>
								<div class="menu">
									<div class="item">
										<a class="dropdown-item" href="{{ url('lang', ['es']) }}" >
											<span style="color: #5d49be;">{{ trans('template.es') }}</span>
										</a>
										<br>
										<br>
										<a class="dropdown-item" href="{{ url('lang', ['en']) }}">
											<span style="color: #5d49be;">{{ trans('template.en') }}</span>
										</a>
									</div>
								</div>
							</div> <!-- Final idioma -->
							
						
								
							<!-- USUARIO -->
							<div class="ui dropdown">
								<input type="hidden">
								<i class="dropdown icon"></i>
								<div class="default text">{{ Auth::user()->name }}</div>
								<div class="menu">
									<div class="item">
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<span style="color: #5d49be;">{{ __('Logout') }}</span>
										</a>	
										 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>	
									</div>
								</div>
							</div> <!-- Final usuario -->
							
						</div> <!-- Final div contenedor --> 	
						
					</div> <!-- Final menu -->
				</div>
			</div>
		
			<div class="round-circle-right"></div>
			<div class="round-circle-left"></div>
			
			<!-- CONTENT -->
			<div class="content-wrapper">
				@yield('content')
			</div>

			<!-- FOOTER -->
			<div class="footer">
				<div class="ui inverted segment" style="border-radius: 0; background-image: linear-gradient(to right, black, #5d49be); bottom: 0%">
					&copy;{{ trans('template.autores') }} Carlos Satizabal {{ trans('template.y') }} Daniel Merino
				</div>
			</div>
		</div>
	</div>	
	
</body>
<script>
	VANTA.NET({
		el: "#vanta-banner",
		mouseControls: true,
		touchControls: true,
		minHeight: 250.00,
		minWidth: 250.00,
		scale: 1.00,
		scaleMobile: 1.00,
		color: 0x5d49be,
		maxDistance: 30.00,
		showDots: true,
		spacing: 25.00,
		points: 25.00
	}) 
	
	$('.ui.dropdown').dropdown();
</script>
</html>