<?php
session_start();
$perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
if ($perfil != "Administrador") {
    header("location: painelAdministrador.php");
}
require_once '../includes/header.php';
require_once '../dao/FiltroDAO.php';
$idFiltro = isset($_GET["id"]) ? ($_GET["id"]) : "";
$filtroDAO = new FiltroDAO();
$filtros = $filtroDAO->listarFiltroById($idFiltro);
?>
<div class="container mb-5">
    <h3 class="text text-center">Editar Filtro</h3>
    <br>
    <form method="post" action="../controller/editarFiltroController.php" enctype="multipart/form-data">
        <input type="hidden" name="idFiltro" value="<?php echo $filtros["idFiltro"]?>">
        <div class="row">
            <div class="col-sm"><label class="text">Marca do filtro</label><input type="text" name="marca" class="form-control" required value="<?php echo $filtros["marcaFiltro"]?>"></div>
            <div class="col-sm"><label class="text">Tipo do filtro</label><input type="text" name="tipo" class="form-control" required value="<?php echo $filtros["tipoFiltro"]?>"></div>
        </div>
        <div class="row">
            <div class="col-sm"><label class="text">Código do Fab.</label><input type="text" name="cod" class="form-control" value="<?php echo $filtros["cod"]?>"></div>
            <div class="col-sm"><label class="text">Motores compatíveis</label><input type="text" name="motores" class="form-control" value="<?php echo $filtros["motorFiltro"]?>"></div>
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