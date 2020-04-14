<?php
session_start();
$perfil = isset($_SESSION["perfil"])? ($_SESSION["perfil"]) : "";
if($perfil != "Administrador"){
    echo "<script>";
    echo "        window.location.href= '../index.php';";
    echo "</script>";
}
require_once '../includes/header.php';
require_once '../dao/CarroDAO.php';
$idM = isset($_GET["id"]) ? ($_GET["id"]) : "";
$carroDAO = new CarroDAO();
$montadoras = $carroDAO->listarMontadoraById($idM);
?>
<div class="container mb-5">
    <h3 class="text text-center">Editar Montadora</h3>
    <form method="post" action="../controller/editM.php">
        <input type="hidden" value="<?php echo $montadoras["idMontadora"]?>" name="idMontadora">
        <div class="row">
            <div class="col-sm">
                <label class="text">Montadora</label>
                <input type="text" class="form-control" value="<?php echo $montadoras["montadora"]?>" name="montadora" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <center>
                <input type="submit" value="Editar" class="btn btn-success" style="margin-top: 10px">
                </center>
            </div>
        </div>
    </form>
</div>
<?php 
require_once '../includes/footer.php';
?>

