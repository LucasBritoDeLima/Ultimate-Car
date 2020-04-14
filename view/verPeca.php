<?php
session_start();
require_once '../includes/header.php';
require_once '../dao/AnuncioDAO.php';
$idPeca = $_GET["id"];
$anuncioDAO = new AnuncioDAO();
$anuncio = $anuncioDAO->listarAnuncioById($idPeca);
?>
<div class="container mb-5">
    <small class="text-center text">Anúncio em <?php echo date('d/m/Y', strtotime($anuncio["dataCadastro"])) ?> | Categoria: <?php echo $anuncio["categoria"]?></small>
    <h1 class="text text-center"><?php echo $anuncio["titulo"]; ?></h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/<?php echo $anuncio["fotoUm"] ?>" class="d-block w-100 img-fluid" style="width: 700px; height: 400px;  object-fit: contain">
            </div>
            <div class="carousel-item">
                <img src="../images/<?php echo $anuncio["fotoDois"] ?>" class="d-block w-100 img-fluid" style="width: 700px; height: 400px;  object-fit: contain">
            </div>
            <div class="carousel-item">
                <img src="../images/<?php echo $anuncio["fotoTres"] ?>" class="d-block w-100 img-fluid" style="width: 700px; height: 400px; object-fit: contain">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #000;"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #000;"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><br>
    <hr>
    <div class="row">
        <div class="col-sm">
            <h3 class="text text-center">Preço</h3>
        </div>
        <div class="col-sm">
            <h3 class="text text-center"><?php echo "R$ " . str_replace(".", ",", $anuncio["preco"]) ?></h3>
        </div>
    </div>
    <hr>
    <div class="row" style="margin-bottom: 10px;"><div class="col-sm"><h3 class="text text-center">Descrição</h3></div></div>
    <div class="row"><div class="col-sm"><p class="text" style="font-size: 20px; text-indent: 20px;"><?php echo $anuncio["descricao"]?></p></div></div>
    <hr>
</div>
<?php
require_once '../includes/footer.php';
?>