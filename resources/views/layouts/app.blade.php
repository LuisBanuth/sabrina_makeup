<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Sabrina MakeUp</title>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @yield('scriptsHead')
  </head>
  <body>
  <style>
    body{
      background-color: #fff2d6;
    }
    nav{
      background-color: #000000;
    }
    nav a {
      color: #b19781 !important;
    }
    #logo {
      height: 50px;
    }

}

  </style>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"><img id="logo" src="{{ asset('assets/img/logo.jpg') }}" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('index') }}">INÍCIO <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FEATURES</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                PRODUTOS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach($product_categories as $pc)
                  <a class="dropdown-item" href="#">{{$pc->name}}</a>
                @endforeach
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  </header>
      @yield('content')
  </body>
  <footer class="footer font-small ">
    <div class="col-md-12 bg-dark mt-4 " style="height: 60px;"></div>
  </footer>
  @yield('scriptsFoot')
</html>



