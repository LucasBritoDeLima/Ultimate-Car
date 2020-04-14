<?php

require_once '../dto/CarroDTO.php';
require_once '../dao/CarroDAO.php';
$idCarro = $_POST["carro"];
$nomeCarro = $_POST["nome"];
$ano = $_POST["ano"];
$motor = $_POST["motor"];
$combustivel = $_POST["combustivel"];
$saeR = $_POST["saeR"];
$saeA = $_POST["saeA"];
$acea = $_POST["acea"];
$api = $_POST["api"];
$tipoOleo = $_POST["tipoOleo"];
$capacidade = $_POST["cap"];
$foto = $_FILES["foto"];

$destino = '../images/' . $foto['name'];
$arquivo_tmp = $foto['tmp_name'];
$fotos = move_uploaded_file($arquivo_tmp, $destino);

$carroDTO = new CarroDTO();
$carroDTO->setNomeCarro($nomeCarro);
$carroDTO->setAno($ano);
$carroDTO->setMotor($motor);
$carroDTO->setCombustivel($combustivel);
$carroDTO->setSaeR($saeR);
$carroDTO->setSaeA($saeA);
$carroDTO->setAcea($acea);
$carroDTO->setApi($api);
$carroDTO->setTipoOleo($tipoOleo);
$carroDTO->setCapacidade($capacidade);
$carroDTO->setFoto($foto['name']);
$carroDTO->setIdCarro($idCarro);

$carroDAO = new CarroDAO();

if ($_FILES["foto"]["size"] == 0) {
    if ($carroDAO->atualizarCarroF($carroDTO)) {
        echo "<script>";
        echo "      window.alert('Alterado com sucesso!');";
        echo "</script>";
        echo "<script>";
        echo "      window.location.href= '../view/gCar.php';";
        echo "</script>";
    } else {
        echo "Não foi possivel atender a solicitação<br>";
    }
} else {
    if ($carroDAO->atualizarCarro($carroDTO)) {
        echo "<script>";
        echo "      window.alert('Alterado com sucesso!');";
        echo "</script>";
        echo "<script>";
        echo "      window.location.href= '../view/gCar.php';";
        echo "</script>";
    } else {
        echo "Não foi possivel atender a solicitação<br>";        
    }
}