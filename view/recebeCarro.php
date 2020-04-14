<?php
    require_once '../includes/header.php';
?>
<?php
#Recebimento de informações do formulário
$carro = isset($_POST["carro"])? ($_POST["carro"]) : "";
$ano = isset($_POST["ano"])? ($_POST["ano"]) : "";
$motor = isset($_POST["motor"])? $_POST["motor"] : "";
#Verificação de escolha
if ($carro == "" && $ano = "" && $motor == ""){
    echo "<script>";
    echo "        window.alert('Por favor defina os valores');";
    echo "        window.location.href = 'gCar.php';";
    echo "</script>";
}
#Chamando a consulta do carro
require_once '../dao/CarroDAO.php';
$carroDAO = new CarroDAO();
$info = $carroDAO->obterInfo($carro, $ano, $motor);
?>
<div class="container mb-5">
    <h3 class="text text-center">Informações do veículo</h3>
    <form method="POST" action="../controller/alterarCarroController.php" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $info["idCarro"]?>" name="carro"/>
        <div class="row">
            <div class="col-sm">
                <label class="text">Nome do carro</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $info["nomeCarro"]?>" required>
            </div>
            <div class="col-sm">
                <label class="text">Ano</label>
                <input type="number" name="ano" class="form-control" value="<?php echo $info["ano"]?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label class="text">Motor</label>
                <input type="text" name="motor" class="form-control" value="<?php echo $info["motor"]?>" required>
            </div>
            <div class="col-sm">
                <label class="text">Combustível</label>
                <input type="text" name="combustivel" class="form-control" value="<?php echo $info["combustivel"]?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label class="text">SAE Recomendado</label>
                <input type="text" name="saeR" class="form-control" value="<?php echo $info["saeR"]?>" required>
            </div>
            <div class="col-sm">
                <label class="text">SAE Alternativo</label>
                <input type="text" name="saeA" class="form-control" value="<?php echo $info["saeA"] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label class="text">ACEA</label>
                <input type="text" name="acea" class="form-control" value="<?php echo $info["acea"]?>" required>
            </div>
            <div class="col-sm">
                <label class="text">API</label>
                <input type="text" name="api" class="form-control" value="<?php echo $info["api"]?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label class="text">Tipo de óleo</label>
                <input type="text" name="tipoOleo" class="form-control" value="<?php echo $info["tipoOleo"]?>" required>
            </div>
            <div class="col-sm">
                <label class="text">Capacidade</label>
                <input type="text" name="cap" class="form-control" value="<?php echo $info["capacidade"]?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label class="text">Foto</label>
                <input type="file" name="foto" class="form-control-file">
                <center>
                <img src="../images/<?php echo $info["foto"]?>" class="img-fluid" style="width: 200px; border: 1px solid #ccc; margin-bottom: 10px; margin-top: 10px;">
                </center>
            </div>
        </div>
        <center>
            <input type="submit" value="Atualizar" class="btn btn-primary">
            <a href="#" class="btn btn-outline-warning">Inativar</a>
        </center>
    </form>
</div>
<?php 
    require_once '../includes/footer.php';
?>