<?php
session_start();
$perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
if ($perfil != "Administrador") {
    echo "<script>";
    echo "window.location.href = '../index.php'; ";
    echo "</script>";
}
require_once '../includes/header.php';
$idModelo = isset($_GET["id"]) ? ($_GET["id"]) : "";
$modelo = isset($_GET["m"]) ? ($_GET["m"]) : "";
?>
<div class="container mb-5">
    <h3 class="text text-center">Editar Modelo</h3>
    <form action="../controller/editModel.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $idModelo ?>">
        <div class="container mb-5">
            <div class="row">
                <div class="col-sm"><label class="text-center text">Modelo</label><input type="text" name="modelo" class="form-control" value="<?php echo $modelo?>" required/></div>
            </div>
            <div class="row">
                <div class="col-sm" style="margin-top: 10px;"><center><input type="submit" name="Atualizar" class="btn btn-primary" value="Atualizar"></center></div>
            </div>
        </div>
    </form>
</div>
<?php
require_once '../includes/footer.php';
?>
