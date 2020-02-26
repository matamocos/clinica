<html lang="es">
  <head>
    <title>Prueba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>
 
    <nav class="navbar navbar-default container">
      <div class="container-fluid">
  
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            
			<li><a href="{{ url('lang', ['en']) }}">En</a></li>
            <li><a href="{{ url('lang', ['es']) }}">Es</a></li>
          </ul>
        </div>
      </div>
    </nav>
 
    <div class="jumbotron container">
        <p>{{ trans('prueba.test') }}</p>
    </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>