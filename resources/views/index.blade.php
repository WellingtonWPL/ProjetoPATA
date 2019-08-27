<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Projeto - PATA</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="css/teste.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" >
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.css" rel="stylesheet">

  <!-- Function JS -->
  <script type="text/javascript" src="js/functions.js"></script>
  
</head> 

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{url('cadastro')}}">Cadastrar-se</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('entrar')}}">Entrar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  @yield('content');
  

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <fieldset id="cores" style="margin-top: -45px">
        <button type="button" id="botao" onclick="changeBG('#007bff')" class="btn btn-primary"></button>
        <button type="button" id="botao" onclick="changeBG('#28a745')" class="btn btn-success"></button>
        <button type="button" id="botao" onclick="changeBG('#dc3545')" class="btn btn-danger"></button>
        <button type="button" id="botao" onclick="changeBG('#ffc107')" class="btn btn-warning"></button>
        <button type="button" id="botao" onclick="changeBG('#6c757d')" class="btn btn-secondary"></button>
    </fieldset>
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; ProjetoPATA 2019</p>
      
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
