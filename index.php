<?php
session_start();
$perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
$idVoid = isset($_SESSION["id"]) ? ($_SESSION["id"]) : "";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

            .text {font-family: 'Muli', sans-serif;}
            .text-color{
                font-family: 'Muli', sans-serif;
                color: #ebebeb;
            }
            .text-color2{
                font-family: 'Muli', sans-serif;
                color: #000;
                font-size: 20px;
            }
            .linha{
                margin-left: auto;
                margin-right: auto;
                background-color: #919191;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ultimate Car</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <header class="p-5">
            <div class="container">
                <img src="img/logo-oficial.png" class="img-fluid rounded mx-auto d-block" alt="Logo Ultimate Car">
            </div>
        </header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view/CentroAutomotivo.php">Centros Automotivos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Pesquisar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="view/pesquisarOleo.php">Óleo</a>
                                <a class="dropdown-item" href="view/pesquisarFiltro.php">Filtro</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="view/formConsulta.php">Veículo</a>
                            </div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Conta
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="view/preCriarConta.php">Criar Conta</a>
                                <a class="dropdown-item" href="view/acessarLogin.php">Login</a>
                            </div>
                        <li class="nav-item">
                            <a class="nav-link" href="view/Pecas.php" tabindex="-1">Peças - Anúncios</a>
                        </li>  
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar no site" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
        if ($perfil == "") {
        } else {
            if ($perfil == "Cliente") {
                echo "<p class=\"text text-center\">" . "Acesse o painel <a href='view/painelUsuario.php'>aqui</a>" . "</p>";
            } elseif ($perfil == "Centro Automotivo") {
                echo "<p class=\"text text-center\">" . "Acesse o painel <a href='view/painelCentroAutomotivo.php'>aqui</a>" . "</p>";
            } else {
                echo "<p class=\"text text-center\">" . "Acesse o painel <a href='view/painelAdministrador.php'>aqui</a>" . "</p>";
            }
        }
        ?>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-9">
                    <div class="jumbotron h-100 mb-0">
                        <h1 class="display-4">Bem vindo ao Ultimate Car!</h1>
                        <p class="lead">Bem vindo ao sitema, que promete fazer você enxergar a troca de óleo do seu carro de uma forma diferente.</p>
                        <hr class="my-4">
                        <p class="text-justify">Ao contrário do que muita gente pensa, trocar o óleo do carro não é um gasto, mas sim uma necessidade. A lubrificação correta é fundamental para a saúde e durabilidade do motor e faz parte dos procedimentos de rotina na manutenção do veículo. A tarefa do óleo é, com a viscosidade, evitar o atrito entre as peças móveis do motor, garantindo bom funcionamento, sem aquecimento excessivo e desgastes no sistema mecânico.<br><p>Fonte:<small><a href="http://www.postogalo.com.br/conheca-mais-sobre-os-postos-galo/a-importancia-da-troca-de-oleo-no-carro.html"> Confira a fonte!</a></small></p></p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Leia mais</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="jumbotron h-100 mb-0">
                        <img src="img/troca-oleo.jpg" class="img-fluid rounded mx-auto d-block"/>
                        <p class="text-center">O óleo correto traz vários beneficios inimaginaveis</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="img/icon1.png" class="card-img-top" alt="Consultar Veículo">
                        <div class="card-body">
                            <h5 class="card-title">Consultar Veículo</h5>
                            <p class="card-text">Consulte um veículo e obtenha as informações necessárias para uma troca de óleo.</p>
                            <a href="view/formConsulta.php" class="btn btn-primary">Clique Aqui</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="img/icon2.png" class="card-img-top" alt="Centros Automotivos">
                        <div class="card-body">
                            <h5 class="card-title">Centros Automotivos</h5>
                            <p class="card-text">Descubra um centro automotivo que realiza troca de óleo e muito mais!</p>
                            <a href="view/CentroAutomotivo.php" class="btn btn-primary">Clique Aqui</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="img/icon3.png" class="card-img-top" alt="Peças">
                        <div class="card-body">
                            <h5 class="card-title">Peças</h5>
                            <p class="card-text">Anuncie ou procure peças usadas de grande valor, que podem te render uma grana extra</p>
                            <a href="view/Pecas.php" class="btn btn-primary">Clique Aqui</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="img/icon4.png" class="card-img-top" alt="Conta">
                        <div class="card-body">
                            <h5 class="card-title">Conta</h5>
                            <p class="card-text">Crie uma conta para anunciar peças ou avaliar centros automotivos e muito mais!</p>
                            <a href="view/preCriarConta.php" class="btn btn-primary">Clique Aqui</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-5 text-muted bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <p>2019 - &copy; Todos os direitos reservados</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Ultimate Car</h4>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
