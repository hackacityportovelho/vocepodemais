<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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

  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="">{{ env('APP_NAME') }}</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Doe</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Nós</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      <img class="img-fluid mb-5 d-block mx-auto" src="/logo.png" alt="">
      <h1 class="text-uppercase mb-0">{{ env('APP_NAME') }}</h1>
      <hr class="star-light">
      <h2 class="font-weight-light mb-0">e juntos podemos fazer a diferença</h2>

      <hr>
      
      <div class="col-sm-4 offset-sm-4">
        <a class="btn btn-xl btn-outline-light" href="{{ route('donator.index') }}">Doador</a>
        <a class="btn btn-xl btn-outline-light" href="{{ route('receiver.index') }}">Parceiro</a>
      </div>
    </div>
  </header>

  <section class="portfolio" id="portfolio">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">Doe</h2>
      <hr class="mb-5">
      <div class="row">
        <div class="card col-sm-3 text-center">
          <div class="card-body">
            <img class="img-fluid" src="/icon1.png" style="height:128px;width:128px" alt="">
            <h5 class="card-title">Roupa</h5>
          </div>
        </div>

        <div class="card col-sm-3 text-center">
          <div class="card-body">
            <img class="img-fluid" src="/icon2.png" style="height:128px;width:128px" alt="">
            <h5 class="card-title">Calçado</h5>
          </div>
        </div>

        <div class="card col-sm-3 text-center">
          <div class="card-body">
            <img class="img-fluid" src="/icon3.png" style="height:128px;width:128px" alt="">
            <h5 class="card-title">Brinquedo</h5>
          </div>
        </div>
        
        <div class="card col-sm-3 text-center">
          <div class="card-body">
            <img class="img-fluid" src="/icon4.png" style="height:128px;width:128px" alt="">
            <h5 class="card-title">Higiene</h5>
          </div>
        </div>

      </div>
    </div>
  </section>


  <section class="bg-primary text-white mb-0" id="about">
    <div class="container">
      <h2 class="text-center text-uppercase text-white">Sobre nós</h2>
      <hr class="star-light mb-5">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <p class="lead text-justify">Doar tem que se tornar cultura em nossa cidade e estado, e o VC PODE + vem com este intuito, através da viabilização que este proporciona, tanto as instituições doadoras quanto as que visam esta doação se conhecerem e praticarem o belíssimo ato que é DOAR.
          </p>
        </div>
      </div>
    </div>
  </section>


  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>VC pode + &copy; 2018</small>
    </div>
  </div>
  <script src="/js/app.js"></script>
  <script src="/js/freelancer.min.js"></script>
</body>

</html>
