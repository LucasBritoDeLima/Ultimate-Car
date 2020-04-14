<?php 
    require_once '../includes/header.php';
?>
<div class="container mb-5">
    <h2 class="text text-center">Login</h2><br>
    <p class="text">Faça login para aproveitar o Ultimate Car em sua totalidade.</p>
</div>
<div id="demo" class="carousel slide text-center" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="../img/mecanico-feliz.jpg" alt="Los Angeles" class="img-fluid" width="700">
      <div class="carousel-caption">
          <h3 class="text">Centro Automotivo</h3>
        <p class="text">Aumente a clientela e seja a referência</p>
      </div>   
    </div>
    <div class="carousel-item">
        <img src="../img/pessoa-feliz.jpg" alt="Chicago" class="img-fluid" width="700">
      <div class="carousel-caption">
        <h3 class="text">Usuário</h3>
        <p class="text">Veja informações, anuncie peças, procure oficinas e mais!</p>
      </div>   
    </div>
    <div class="carousel-item">
        <img src="../img/oficina-mecanica.jpg" alt="New York" class="img-fluid" width="700">
      <div class="carousel-caption">
        <h3 class="text">Descubra oficinas</h3>
        <p class="text">Procure por peças, serviços, oficinas e mais</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon" style="color: #000; background-color: #000; border-radius: 3px 3px 3px"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon" style="color: #000; background-color: #000; border-radius: 3px 3px 3px"></span>
  </a>
</div>
<div class="container mb-5 text-center"><br>
    <h4 class="text text-center">Clique nos botões abaixo para acessar de acordo com o seu tipo de conta</h4>
    <br>
    <a class="btn btn-primary" href="#" role="button">Usuário</a>&nbsp;
    <a class="btn btn-success" href="#" role="button">Centro Automotivo</a>&nbsp;
    <a class="btn btn-danger" href="#" role="button">Administração</a>
</div>

<?php 
require_once '../includes/footer.php';
?>

