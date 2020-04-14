<?php
session_start();
require_once '../dto/CentroAutomotivoDTO.php';
require_once '../dao/CentroAutomotivoDAO.php';

$idCentroAutomotivo = $_POST["idcentroautomotivo"];
$nomefantasia = $_POST["nomefantasia"];
$razaosocial = $_POST["razaosocial"];
$cnpj = $_POST["cnpj"];
$ie = $_POST["ie"];
$logradouro=$_POST["logradouro"];
$numero=$_POST["numero"];
$cep=$_POST["cep"];
$bairro=$_POST["bairro"];
$estado=$_POST["estado"];
$cidade=$_POST["cidade"];
$tel=$_POST["telefone"];
$servicos=$_POST["servico"];
$email=$_POST["email"];

$centroAutomtivoDTO = new CentroAutomotivoDTO();
$centroAutomtivoDTO->setIdCentro($idCentroAutomotivo);
$centroAutomtivoDTO->setNomeFantasia($nomefantasia);
$centroAutomtivoDTO->setRazaoSocial($razaosocial);
$centroAutomtivoDTO->setCnpj($cnpj);
$centroAutomtivoDTO->setIe($ie);
$centroAutomtivoDTO->setLogradouro($logradouro);
$centroAutomtivoDTO->setNumero($numero);
$centroAutomtivoDTO->setCep($cep);
$centroAutomtivoDTO->setBairro($bairro);
$centroAutomtivoDTO->setEstado($estado);
$centroAutomtivoDTO->setCidade($cidade);
$centroAutomtivoDTO->setTelefone($tel);
$centroAutomtivoDTO->setServicos($servicos);
$centroAutomtivoDTO->setEmail($email);

$centroAutomotivoDAO = new CentroAutomotivoDAO();
if($centroAutomotivoDAO->atualizar($centroAutomtivoDTO)){
echo "<script>";
echo "    window.location.href='../view/painelCentroAutomotivo.php';";
echo "</script>";
}else{
    die("Erro ao editar o usuario");
}