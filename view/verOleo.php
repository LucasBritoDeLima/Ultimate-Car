<?php
session_start();
require_once '../includes/header.php';
require_once '../dao/OleoDAO.php';
$oleoDAO = new OleoDAO();
$idOleo = isset($_GET['id']) ? ($_GET['id']) : "";
$oleo = $oleoDAO->listarOleoById($idOleo);
?>
<div class="container mb-5">
    <h3 class="text text-center">Ver informações do óleo <span style="font-style: italic;"><?php echo $oleo['marcaOleo'] ?> - <?php echo $oleo['nomeOleo'] ?></span></h3>
    
    <div class="row">
        <div class="col-sm">
        <center>
        <div class="card" style="width: 18rem;">
            <img src="../images/<?php echo $oleo['foto']?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $oleo['nomeOleo'] ?></h5>
                <p class="card-text text-justify"><b>Marca:</b> <?php echo $oleo['marcaOleo'] ?><br> <b>Tipo:</b> <?php echo $oleo['tipoOleo'] ?><br> <b><u>Caracteristicas</u></b><br> <b>Api: </b><?php echo $oleo['apiOleo'] ?><br><b>SAE: </b><?php echo $oleo['sae'] ?><br/><b>ACEA: </b><?php echo $oleo['acea']?></p>
            </div>
        </div>
        </center>
        </div>
    </div>
    
</div>
<?php
require_once '../includes/footer.php';
?>

