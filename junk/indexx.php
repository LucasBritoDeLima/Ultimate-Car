<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ultimate Car - Home</title>
    <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/grid.css"/>
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body>
    <div class="container-grid">
        <!-- Coluna com data e hora-->
        <div class="row-grid">
            <div class="col-grid col-2-grid">
                <div class="teste  fundoazul corbranca"><?php 
                    //Capturando o fuso horário do Brasil
                    date_default_timezone_set('America/Sao_Paulo');
                    //Capturar a hora
                    $hora = date('H:i:s');
                    //Explode a string hora
                    $explodeHora = explode(':',$hora);
                    //Verifica o estado do dia
                    if ($explodeHora > 5 && $explodeHora < 12){
                        echo "Bom dia, São $hora";
                    } elseif ($explodeHora > 12 && $explodeHora < 18) {
                        echo "Boa tarde, São $hora";
                    } else {
                        echo "Boa noite, São $hora";
                    }
                    ?></div>
            </div>
            <div class="col-grid col-2-grid">
                <div class="teste  fundoazul corbranca text-center">Minha Conta</div>
            </div>
        </div>
        <!-- nada mesmo-->
        <div class="row">
            <div class="col">
                <div class="teste"><img src="img/logo.png" width="30%" class="img-fluid rounded float-left" alt="Responsive image"></div>
            </div>
        </div>
        <!-- fim do nada mesmo-->
        <div class="row-grid">
            <div class="col-grid">
                <div class="teste">
                <!--Menu dropdown-->    
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: rgb(44,181,233)">
  <a class="navbar-brand" href="#">Ultimate Car</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Centros Automotivos</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consultas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Óleo</a>
          <a class="dropdown-item" href="#">Filtro</a>
          <a class="dropdown-item" href="#">Carro Modo Fast</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Carro Modo Completo</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Peças</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>-->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquise" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>
    </div>
        </div>
            </div>
    </div>
    
</body>
</html>