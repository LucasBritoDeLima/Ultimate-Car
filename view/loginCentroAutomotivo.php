<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Área Administrativa - Ultimate Car</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style-login.css"/>
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
        <img src="../img/logo-login.png">
      <br>
      <h3 class="text">Centro Automotivo - Ultimate Car</h3>
      <hr width="80%">
    </div>

    <!-- Login Form -->
    <form method="POST" action="../controller/loginControllerCentroAutomotivo.php">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Seu Usuário">
      <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Sua Senha">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Esqueceu a Senha?</a>
    </div>

  </div>
</div>
</body>
</html>