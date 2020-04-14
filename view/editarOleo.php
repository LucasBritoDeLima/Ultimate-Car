<?php
session_start();
$perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
if ($perfil != "Administrador") {
    header("location: painelAdministrador.php");
}
require_once '../includes/header.php';
require_once '../dao/OleoDAO.php';
$idOleo = isset($_GET["id"]) ? ($_GET["id"]) : "";
$oleoDAO = new OleoDAO();
$oleos = $oleoDAO->listarOleoById($idOleo);
?>
<div class="container mb-5">
    <form method="post" action="../controller/editarOleoController.php" enctype="multipart/form-data">
        <input type="hidden" name="idOleo" value="<?php echo $oleos["idOleo"]?>">
        <div class="row">
            <div class="col-sm"><label class="text">Nome do óleo</label><input type="text" name="nomeoleo" class="form-control" required value="<?php echo $oleos["nomeOleo"]?>"></div>
            <div class="col-sm"><label class="text">Marca</label><input type="text" name="marca" class="form-control" required value="<?php echo $oleos["marcaOleo"]?>"></div>
        </div>
        <div class="row">
            <div class="col-sm"><label class="text">API</label><input type="text" name="api" class="form-control" value="<?php echo $oleos["apiOleo"]?>"></div>
            <div class="col-sm"><label class="text">Viscosidade SAE</label><input type="text" name="sae" class="form-control" value="<?php echo $oleos["sae"]?>"></div>
        </div>
        <div class="row">
            <div class="col-sm"><label class="text">ACEA</label><input type="text" name="acea" class="form-control" value="<?php echo $oleos["acea"]?>"></div>
            <div class="col-sm"><label class="text">Tipo</label><select name="tipo" class="form-control"><option value="Mineral">Mineral</option><option value="Sintético">Sintético</option><option value="Semi-Sintético">Semi-Sintético</option></select></div>
        </div>
        <div class="row">
            <div class="col-sm"><label class="text">Foto</label><input type="file" name="foto" class="form-control-file"/></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="text text-center"><button type="Submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp;Enviar</button></p></div>
        </div>
    </form>
</div>
<?php
require_once '../includes/footer.php';
?>
