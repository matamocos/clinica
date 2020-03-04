<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clínica</title>

		<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
		
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
			
			#canvas{
				position: absolute;
				display: block;
				top: 0;
				left: 0;
				z-index: -1;
				background-color: #140f28;
			}
			
			#text{
				position: absolute;
				display: block;
				top: 0;
				width: 100%;
				color: white;
				left: 0;
				z-index: 1;
			}
			
            html, body {
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
		<canvas id="canvas"></canvas>
		<div id="text">
			<div class="flex-center position-ref full-height">
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
							<a id="btn_login" href="{{ route('login') }}">Login</a>

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
								<a href="/pacientes">Pacientes</a>
								<a href="/medicos">Médicos</a>
								<a href="/citas">Citas</a>
								<a href="/tratamientos">Tratamientos</a>
								<a href="/estadisticas">Estadísticas</a>
							 @endauth
						@endif
					</div>
				</div>
			</div>
		</div>
    </body>
	
	<script>
		$(document).ready(function(){
			
			let resizeReset = function() {
				w = canvasBody.width = window.innerWidth;
				h = canvasBody.height = window.innerHeight;
			}

			const opts = { 
				particleColor: "rgb(138, 120, 227)",
				lineColor: "rgb(194,182,255)",
				particleAmount: 100,
				defaultSpeed: 0.3,
				variantSpeed: 0.5,
				defaultRadius: 2,
				variantRadius: 2,
				linkRadius: 200,
			};

			window.addEventListener("resize", function(){
				deBouncer();
			});

			let deBouncer = function() {
				clearTimeout(tid);
				tid = setTimeout(function() {
					resizeReset();
				}, delay);
			};

			let checkDistance = function(x1, y1, x2, y2){ 
				return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
			};

			let linkPoints = function(point1, hubs){ 
				for (let i = 0; i < hubs.length; i++) {
					let distance = checkDistance(point1.x, point1.y, hubs[i].x, hubs[i].y);
					let opacity = 1 - distance / opts.linkRadius;
					if (opacity > 0) { 
						drawArea.lineWidth = 0.5;
						drawArea.strokeStyle = `rgba(${rgb[0]}, ${rgb[1]}, ${rgb[2]}, ${opacity})`;
						drawArea.beginPath();
						drawArea.moveTo(point1.x, point1.y);
						drawArea.lineTo(hubs[i].x, hubs[i].y);
						drawArea.closePath();
						drawArea.stroke();
					}
				}
			}

			Particle = function(xPos, yPos){ 
				this.x = Math.random() * w; 
				this.y = Math.random() * h;
				this.speed = opts.defaultSpeed + Math.random() * opts.variantSpeed; 
				this.directionAngle = Math.floor(Math.random() * 360); 
				this.color = opts.particleColor;
				this.radius = opts.defaultRadius + Math.random() * opts. variantRadius; 
				this.vector = {
					x: Math.cos(this.directionAngle) * this.speed,
					y: Math.sin(this.directionAngle) * this.speed
				};
				this.update = function(){ 
					this.border(); 
					this.x += this.vector.x; 
					this.y += this.vector.y; 
				};
				this.border = function(){ 
					if (this.x >= w || this.x <= 0) { 
						this.vector.x *= -1;
					}
					if (this.y >= h || this.y <= 0) {
						this.vector.y *= -1;
					}
					if (this.x > w) this.x = w;
					if (this.y > h) this.y = h;
					if (this.x < 0) this.x = 0;
					if (this.y < 0) this.y = 0;	
				};
				this.draw = function(){ 
					drawArea.beginPath();
					drawArea.arc(this.x, this.y, this.radius, 0, Math.PI*2);
					drawArea.closePath();
					drawArea.fillStyle = this.color;
					drawArea.fill();
				};
			};

			function setup(){ 
				particles = [];
				resizeReset();
				for (let i = 0; i < opts.particleAmount; i++){
					particles.push( new Particle() );
				}
				window.requestAnimationFrame(loop);
			}

			function loop(){ 
				window.requestAnimationFrame(loop);
				drawArea.clearRect(0,0,w,h);
				for (let i = 0; i < particles.length; i++){
					particles[i].update();
					particles[i].draw();
				}
				for (let i = 0; i < particles.length; i++){
					linkPoints(particles[i], particles);
				}
			}

			const canvasBody = document.getElementById("canvas"),
			drawArea = canvasBody.getContext("2d");
			let delay = 200, tid,
			rgb = opts.lineColor.match(/\d+/g);
			resizeReset();
			setup();

		});
	</script>
	
</html>
