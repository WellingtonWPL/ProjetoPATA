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
    href="{{ asset('/css/teste.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/bootstrap-grid.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/bootstrap-reboot.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/bootstrap-reboot.min.css') }}">

  <!-- Custom fonts for this template -->
  <link
    href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css?family=Alegreya&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('/css/one-page-wonder.css') }}" rel="stylesheet">

  <!-- Function JS -->
  <script type="text/javascript" src="{{ asset('/js/functions.js') }}">
  </script>
  @yield('css')

  {{-- <script src="/vendor/jquery/jquery.min.js"></script> --}}
  <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>


    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('icone/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('icone/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('icone/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('icone/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('icone/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('icone/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('icone/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('icone/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('icone/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('icone/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icone/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('icone/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icone/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('icone/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <style>


        i {
           font-size: 24px !important;
           vertical-align: middle;
       }

       ul li {
         list-style: none;
       }

       ul li a {
         color: aliceblue;
       }

       #titulo{
         font-family: 'Alegreya', serif;
         color: white;
         margin-left:10%;

       }

       #background{
            background-image: url({{ asset("/img/patinhas.png")}});
           background-size: 200px;
       }

       h1{
           font-size: 30px;

       }

       #logo-proj{
           /* height: 100%; */
            width: 150px;
       }

     </style>
</head>
@php
  use App\Http\Controllers\PerfilController;
  if (Auth::check()){
    $notificaçoes = PerfilController::getSolicitacoes(Auth::user()->cod_usuario);
  }
  else{
    $notificaçoes = 0;
  }


@endphp

@if ($notificaçoes >= 1)
    <style>
      #perfil{
        color: tomato;
      }
    </style>

@endif


<body id="background" >

  <script>
    // window.addEventListener('load', function() {
    //     changeBG('#eeeeee');
    // });
  </script>
  <!-- Navigation -->
  <nav
    id="navegador" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-item{{--brand--}}" href="#" id="logo-proj">
            <img style="max-width:10%; {{--height:auto;--}} " src="{{asset('/img/logo.png')}}" alt="pata">
      </a>

      <div id="titulo" name="titulo" class="title m-1"><h1>@yield("titulo")</h1></div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
      style="float:left"
      >
            <span class="navbar-toggler-icon"></span>
          </button>
      {{-- <a class="navbar-brand" href="{{url('/lista')}}"><img style="max-width: 30%; height: auto;" src="{{asset('/img/teste.png')}}" alt="pata"></a> --}}
      {{-- <button class="navbar-toggler" data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
      <ul class="navbar-nav">
            <div class="collapse navbar-collapse" id="navbarResponsive">
        <li class="nav-item">
          <a class="nav-link"
            href="{{url('/lista')}}">Lista <i
            class="material-icons">pets</i></a>

        </li>


        {{-- </ul> --}}

        @guest



        <div class="collapse navbar-collapse"
          id="navbarResponsive">
          {{-- <ul class="navbar-nav ml-auto"> --}}
          <li class="nav-item">
            <a class="nav-link"
              href="{{url('register')}}">Cadastrar-se <i
              class="material-icons">assignment</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
              href="{{url('login')}}">Entrar <i
              class="material-icons">input</i></a>
          </li>
      </ul>
    </div>
    @else
    {{-- <ul class="navbar-nav ml-auto"> --}}
    <li class="nav-item">
      <a class="nav-link" id="perfil"
        href="{{url('perfil/'.Auth::user()->cod_usuario)}}">Perfil <i
        class="material-icons">face</i></a>
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
          href="{{ url('sair') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Sair') }}
        </a>

        <form id="logout-form"
          action="{{ url('sair') }}" method="POST"
          style="display: none;">
          @csrf
        </form>
      </div>
    </li>

    @if (App\Http\Controllers\AdminController::ehAdmin())
        <li class="nav-item">
            <a class="nav-link" id=""
            href="{{url('admin/')}}">
                Administrativo
            </a>
        </li>
    @endif
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
        onclick="changeBackGround('lightblue')"
        {{-- onclick="changeBG('#B39DDB')"  --}}
        class="btn btn-primary"></button>
      <button type="button" id="botao"
        {{-- onclick="changeBG('#E6EE9C')" --}}
        onclick="changeBackGround('lightgreen')"
        class="btn btn-success"></button>
      <button type="button" id="botao"
        {{-- onclick="changeBG('#ef9a9a')" --}}
        onclick="changeBackGround('#ef9a9a')"
        class="btn btn-danger"></button>
      <button type="button" id="botao"
        {{-- onclick="changeBG('#FFF59D')" --}}
        onclick="changeBackGround('#FFF59D')"
        class="btn btn-warning"></button>
      <button type="button" id="botao"
        {{-- onclick="changeBG('#eeeeee')" --}}
        onclick="changeBackGround('lightgrey')"
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
  <script>
  $(document).ready(function(){
        var cor = localStorage.getItem('cor');
        if(cor === null){
          cor = 'lightgrey'
        }
        //alert(cor);
        document.body.style.backgroundColor = cor;
  });

  function changeBackGround(cor){
    document.body.style.backgroundColor = cor;
    localStorage.setItem('cor', cor);
  }

  </script>

</body>

</html>
