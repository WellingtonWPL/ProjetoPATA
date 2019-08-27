<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Projeto - PATA</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css"
    href="/css/teste.css">
  <link rel="stylesheet" type="text/css"
    href="/css/bootstrap.css">
  <link rel="stylesheet" type="text/css"
    href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"
    href="/css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css"
    href="/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css"
    href="/css/bootstrap-reboot.css">
  <link rel="stylesheet" type="text/css"
    href="/css/bootstrap-reboot.min.css">

  <!-- Custom fonts for this template -->
  <link
    href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/one-page-wonder.css" rel="stylesheet">

  <!-- Function JS -->
  <script type="text/javascript" src="/js/functions.js">
  </script>
  @yield('css')

  {{-- <script src="/vendor/jquery/jquery.min.js"></script> --}}
  <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

  <style>
    ul li {
      list-style: none;
    }

    ul li a {
      color: aliceblue;
    }
  </style>
</head>

<body>
  <script>
    window.addEventListener('load', function() {
        changeBG('#eeeeee');
    });
  </script>
  <!-- Navigation -->
  <nav
    class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand"
        href="{{url('/lista')}}">Pata</a>
      <button class="navbar-toggler" data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"
            href="{{url('/lista')}}">Lista</a>

        </li>


        {{-- </ul> --}}

        @guest
        <div class="collapse navbar-collapse"
          id="navbarResponsive">
          {{-- <ul class="navbar-nav ml-auto"> --}}
          <li class="nav-item">
            <a class="nav-link"
              href="{{url('register')}}">Cadastrar-se</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
              href="{{url('entrar')}}">Entrar</a>
          </li>
      </ul>
    </div>
    @else
    {{-- <ul class="navbar-nav ml-auto"> --}}
    <li class="nav-item">
      <a class="nav-link"
        href="{{url('perfil')}}">Perfil</a>
    </li>

    <li class="nav-item dropdown">

      <a id="navbarDropdown"
        class="nav-link dropdown-toggle" href="#"
        role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->nome }} <span class="caret"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right"
        aria-labelledby="navbarDropdown">
        <a class="dropdown-item"
          href="{{ route('logout') }}"
          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form"
          action="{{ route('logout') }}" method="POST"
          style="display: none;">
          @csrf
        </form>
      </div>
    </li>
    </ul>
    @endguest


    </div>
  </nav>


  {{-- CONTEUDO --}}
  <div class="container"
    style="margin-top: 100px; margin-bottom: 100px; align: center;">
    @yield('conteudo')
  </div>

  <!-- Footer -->
  <footer class="py-3 bg-black fixed-bottom">
    <fieldset id="cores" style="margin-top: -10px">
      <button type="button" id="botao"
        onclick="changeBG('#B39DDB')"
        class="btn btn-primary"></button>
      <button type="button" id="botao"
        onclick="changeBG('#E6EE9C')"
        class="btn btn-success"></button>
      <button type="button" id="botao"
        onclick="changeBG('#ef9a9a')"
        class="btn btn-danger"></button>
      <button type="button" id="botao"
        onclick="changeBG('#FFF59D')"
        class="btn btn-warning"></button>
      <button type="button" id="botao"
        onclick="changeBG('#eeeeee')"
        class="btn btn-secondary"></button>
    </fieldset>
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright
        &copy; ProjetoPATA 2019</p>

    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script
    src="/vendor/bootstrap/js/bootstrap.bundle.min.js">
  </script>

</body>

</html>