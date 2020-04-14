<?php
session_start();
require_once '../includes/header.php';
require_once '../dao/FiltroDAO.php';
$filtroDAO = new FiltroDAO();
$idFiltro = isset($_GET['id']) ? ($_GET['id']) : "";
$filtros = $filtroDAO->listarFiltroById($idFiltro);
?>
<div class="container mb-5">
    <h3 class="text text-center">Ver aplicação do filtro <span style="font-style: italic;"><?php echo $filtros['marcaFiltro'] ?> - <?php echo $filtros['cod'] ?></span></h3>
    
    <div class="row">
        <div class="col-sm">
        <center>
        <div class="card" style="width: 18rem;">
            <img src="../images/<?php echo $filtros['foto']?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $filtros['cod'] ?></h5>
                <p class="card-text text-justify"><b>Marca:</b> <?php echo $filtros['marcaFiltro'] ?><br> <b>Tipo:</b> <?php echo $filtros['tipoFiltro'] ?><br> <b>Aplicação:</b> <?php echo $filtros['motorFiltro'] ?></p>
            </div>
        </div>
        </center>
        </div>
    </div>
    
</div>
<?php
require_once '../includes/footer.php';
?>

