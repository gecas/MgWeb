<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>MgWeb</title>
	<base href="http://localhost:8000">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">MgWeb</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="/">Pradinis</a></li>
            <li><a href="about">Apie</a></li>
            <li><a href="contact">Kontaktai</a></li>
            <li><a href="blog">BLOGas</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="/auth/login">Login</a></li>
            <li><a href="/auth/register">Register</a></li>
		@else
			<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user balta"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
						
							
							<li><a href="/users/{{ Auth::user()->name}}/{{ Auth::user()->id }}/edit"><i class="glyphicon glyphicon-user"></i> Profilio nustatymai</a></li>
							
							<li><a href="/auth/logout"><i class="glyphicon glyphicon-off"></i> Atsijungti</a></li>
							</ul>
						</li>
          </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>
 	@include('flash::message')
	@yield('content')
	

	<footer class="footer">
		Footer
	</footer>
<!-- Scripts -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="/js/all.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
</body>
</html>