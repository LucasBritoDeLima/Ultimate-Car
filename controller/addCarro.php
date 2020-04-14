<?php
require_once '../dao/CarroDAO.php';
require_once '../dto/CarroDTO.php';
$modelo = $_POST["modelo"];
$nome = $_POST["nome"];
$ano = $_POST["ano"];
$motor = $_POST["motor"];
$combustivel = $_POST["combustivel"];
$saeR = $_POST["saeR"];
$saeA = $_POST["saeA"];
$acea = $_POST["acea"];
$api = $_POST["api"];
$tipoOleo = $_POST["tipoOleo"];
$cap = $_POST["cap"];
$foto = $_FILES["foto"];

$destino = '../images/' . $foto['name'];
$arquivo_tmp = $foto['tmp_name'];
$fotos = move_uploaded_file( $arquivo_tmp, $destino);

$carroDTO = new CarroDTO();
$carroDTO->setModelo_id($modelo);
$carroDTO->setNomeCarro($nome);
$carroDTO->setAno($ano);
$carroDTO->setMotor($motor);
$carroDTO->setCombustivel($combustivel);
$carroDTO->setSaeR($saeR);
$carroDTO->setSaeA($saeA);
$carroDTO->setAcea($acea);
$carroDTO->setApi($api);
$carroDTO->setTipoOleo($tipoOleo);
$carroDTO->setCapacidade($cap);
$carroDTO->setFoto($foto['name']);

$carroDAO = new CarroDAO();
if($carroDAO->newCarro($carroDTO)){
        echo "<script>";
        echo "          window.alert(\"Cadastrado com sucesso!\");";
        echo "</script>";
        echo "<script>";
        echo "     window.location.href=\"../view/painelAdministrador.php\";";
        echo "</script>";
} else {
    echo "<b>Não foi possivel cadastrar</b><br/>";
    var_dump($carroDAO);
}
