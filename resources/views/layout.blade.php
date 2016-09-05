<!DOCTYPE html>
<html>
<head>
	<title>Project Poll</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/4.2.6/sweetalert2.min.css">
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Project Poll</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="/poll">Latest</a></li>
            <li><a href="/poll/create">Create</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="container">
		@yield('content')
	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/4.2.6/sweetalert2.min.js"></script>

@yield('js')
@include('partials.alerts')


</body>
</html>
