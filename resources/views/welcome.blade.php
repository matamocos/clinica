<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clínica</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		
		<!-- VANTA JS ASSETS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
		<!--<script type="module" src="{{ asset('/assets/vanta/src/vanta.net.js',true)}}"></script>-->
		<script src="https://www.vantajs.com/dist/vanta.net.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="vanta-banner" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                       	<div style="text-align: center">{{ Auth::user()->name }}</div>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span>{{ __('Logout') }}</span>
						</a>	
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>	
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Clínica Dalos
                </div>

                <div class="links">
					@if (Route::has('login'))
						@auth
							<a href="/inicio">Página de inicio</a>
							<a href="/pacientes">Pacientes</a>
							<a href="/medicos">Médicos</a>
							<a href="/citas">Citas</a>
							<a href="/tratamientos">Tratamientos</a>
						 @endauth
					@endif
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
	</script>
	
</html>
