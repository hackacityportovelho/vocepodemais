<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token()  }}">

  <title>{{ env('APP_NAME') }}</title>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <link href="/css/app.css" rel="stylesheet">
  <link href="/css/freelancer.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color:#2c3e50!important">
    <a class="navbar-brand" href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <!--
	<li class="nav-item">
	  <a class="nav-link" href="{{ route('donator.index') }}">Doador</a>
	</li>
        <li class="nav-item">
	  <a class="nav-link" href="{{ route('donator.create') }}">Novo doador</a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="{{ route('donator.visualization') }}">Onde doar</a>
	</li>
        <li class="nav-item">
	  <a class="nav-link" href="{{ route('receiver.index') }}">ONG</a>
	</li>
        <li class="nav-item">
	  <a class="nav-link" href="{{ route('receiver.create') }}">Nova ONG</a>
	</li>
        <li class="nav-item">
	  <a class="nav-link" href="{{ route('receiver.visualization') }}">Onde ONG</a>
	</li>
        <li class="nav-item">
	  <a class="nav-link" href="{{ route('receiver.visualization') }}">Novo ponto</a>
	</li>
        -->
      </ul>
      <span class="navbar-text">
      @if(auth()->check())
       Usuário: <strong>{{ auth()->user()->name }}</strong>
       <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Sair</a>
      @endif()
      </span>
    </div>
  </nav>


  <div class="container-fluid" style="margin-top:45px">
    @yield('content')
  </div>

  <script src="/js/app.js"></script>
  <script src="/js/freelancer.min.js"></script>
  @yield('script')

</body>

</html>
