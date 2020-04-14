<?php 
$perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fontawesome/css/all.min.css" rel="stylesheet" type="text/css"/>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../fontawesome/js/all.js" type="text/javascript"></script>
    <script src="../js/mascara.min.js" type="text/javascript"></script>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
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
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }
    </style>
    <style>
.dica {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.dica .dicatext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.dica .dicatext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.dica:hover .dicatext {
  visibility: visible;
  opacity: 1;
}
.oleo{
            background-image: url(../images/fundo-oleo.jpeg);
            background-repeat: repeat;
            opacity: 0.92222;
            object-fit: cover;
            font-size: 20px;
            color: #000;
            font-weight: bold;

}
.arr{
    border-radius: 10px;
    
    }
.muda{
    margin-top: 20px;
    width: 200px;
    border-radius: 5px;
    -webkit-transition: all 0.7s ease;
    transition: all 0.7s ease;
    background-color: rgba(0,0,0,0.6);

}
.muda:hover{
    width: 600px;
}
.mgi{}
.mgi:hover{
     -webkit-transition: all 0.7s ease;
       transition: all 0.7s ease;
       background-color: rgba(0,0,0,0.6);
}
</style>
<style>
    /*Estilo dos anúncios*/
.boxing{ 
    overflow: hidden;
    position: relative;
}
.boxing:before{
    content: '';
    background-color: rgba(255,255,255,0.8);
    border-radius:5px;
    box-shadow:0 2px 5px #000;
    opacity: 0;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    z-index: 1; 
    transform: rotateY(90deg) translate(50%, 0) scale(0.5);
    -webkit-transform: rotateY(90deg) translate(50%, 0) scale(0.5);
    -moz-transform: rotateY(90deg) translate(50%, 0) scale(0.5);
    -ms-transform: rotateY(90deg) translate(50%, 0) scale(0.5);
    -o-transform: rotateY(90deg) translate(50%, 0) scale(0.5); 
    transition: 1s ease;
}
.boxing:hover:before{
    left: 15px;
    right: 15px;
    bottom: 15px;
    top: 15px;
    opacity: 1;
    animation:bounce-left 1s ease-in forwards;
}
.boxing img{
    width: 100%;
    height: auto;
    transition: all 0.3s ease 0s;
}
.boxing:hover img{ transform: scale(1.5); }
.boxing .box-content{
    color: #fff;
    text-align: center;
    width: 100%;
    height: 100%;
    transform:translateX(-50%) translateY(-50%) scale(1);
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 2;
    transition:all 0.3s ease 0.5s;
}
.boxing .content{
    opacity: 0;
    transform: translateX(-50%) translateY(-50%);
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 2;
    transition: all 0.3s ease 0s;
    padding: 0;
    width: 90%;
}
.boxing:hover .content{ opacity: 1; }
.boxing .title{
    color: #000;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    transform: translateY(-500px);
    opacity: 0;
    transition:all 0.8s ease 0.3s;
}
.boxing .post{
    color: #000;
    font-size:15px;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: capitalize;
    display: inline-block;
    margin-bottom: 10px;
    opacity: 0;
    transform:translateY(-500px);
    transition:all 0.8s ease 0.15s;
}
.boxing:hover .title,
.boxing:hover .post{
    opacity: 1;
    transform:translateY(0);
}
.boxing .icon{
    list-style: none;
    text-align: center;
    padding: 0;
    margin: 0;
}
.boxing .icon li{
    margin:0 4px;
    opacity: 0;
    display: inline-block;
    transform: translateY(-200px);
    transition: all 0.8s ease 0s;
}
.boxing .icon li:nth-child(2){ transition-delay: 0.1s; }
.boxing:hover .icon li{
    opacity: 1;
    transform: translateY(0);
}
.boxing .icon li a{
    color: #000;
    background-color: #ddd;
    font-size: 18px;
    line-height: 33px;
    height: 35px;
    width: 35px;
    border: 2px solid #fff;
    border-radius: 50%;
    display: block;
    transition: all 0.3s ease 0s;
}
.boxing .icon li a:hover{
    color: #fff;
    background-color: #c00; 
}
@keyframes bounce-left{
    25%,50%,75%,100%{ transform:translateX(0); }
    40%{ transform:translateX(30px); }
    70%{ transform:translateX(15px); }
    90%{ transform:translateX(5px); }
}
@media only screen and (max-width:990px){
    .box{ margin-bottom: 30px; }
}
@media only screen and (max-width:479px){
    .box .title{ font-size: 18px; }
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>Ultimate Car</title>
   
</head>

<body>
    <header class="p-5">
      <div class="container">
          <img src="../img/logo-oficial.png" class="img-fluid rounded mx-auto d-block" alt="Logo Ultimate Car">
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
                  <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="../view/CentroAutomotivo.php">Centros Automotivos</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     Pesquisar
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../view/pesquisarOleo.php">Óleo</a>
                     <a class="dropdown-item" href="../view/pesquisarFiltro.php">Filtro</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="../view/formConsulta.php">Veículo</a>
                  </div>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     Conta
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../view/preCriarConta.php">Criar Conta</a>
                      <a class="dropdown-item" href="../view/acessarLogin.php">Login</a>
                      <?php if($perfil == "Cliente" ) {?>
                      <a class="dropdown-item" href="../view/painelUsuario.php">Painel</a>
                      <?php } elseif($perfil == "Centro Automotivo"){ ?>
                      <a class="dropdown-item" href="../view/painelCentroAutomotivo.php">Painel</a>
                      <?php } elseif($perfil == "Administrador"){?>
                      <a class="dropdown-item" href="../view/painelAdministrador.php">Painel</a>
                      <?php } elseif($perfil == ""){}?>
                  </div>
                  <li class="nav-item">
                      <a class="nav-link" href="../view/Pecas.php" tabindex="-1">Peças - Anúncios</a>
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