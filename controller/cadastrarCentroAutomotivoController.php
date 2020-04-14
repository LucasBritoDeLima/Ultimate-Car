<?php
require_once '../dto/CentroAutomotivoDTO.php';
require_once '../dao/CentroAutomotivoDAO.php';
require_once '../dto/EmpregadoDTO.php';

//Recuperar variaveis do form
$responsavel = $_POST["responsavel"];
$sobrenome = $_POST["sobrenome"];
$celular = $_POST["celularresp"];
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
$telefone=$_POST["telefone"];
$cel = $_POST["celular"];
$servicos=$_POST["servico"];
$usuario=$_POST["email"];
$emailcentroautomotivo=$_POST["emailcentroautomotivo"];
$emailresp=$_POST["email"];
$senha= md5($_POST["senha"]);
$perfil = "3";
$data = date("Y/m/d");
$nomeCompleto = $responsavel." ".$sobrenome;

//Tratamento de strings
$chars = array(".","(",")"," ","-",",",".","/","\\","..");
$ne = str_replace($chars,"",$telefone);
$cnpjf = str_replace($chars,"" ,$cnpj);
$cepf = str_replace($chars,"" ,$cep);
$telefonef = str_replace($chars,"" ,$telefone);
$celf = str_replace($chars, "", $cel);

$telefoneff = str_replace(".", "", $telefonef);
$cnpjff = str_replace(".", "", $cnpjf);
$cepff = str_replace(".", "", $cepf);
$celff = str_replace(".", "", $celf);
####
$empregadoDTO = new EmpregadoDTO();
$empregadoDTO->setUsuario($emailresp);
$empregadoDTO->setSenha($senha);
$empregadoDTO->setNome($nomeCompleto);
$empregadoDTO->setEmail($emailresp);
$empregadoDTO->setTelefone($celff);
$empregadoDTO->setDataCadastro($data);
$empregadoDTO->setPerfil_id("3");
##
$centroAutomotivoDTO = new CentroAutomotivoDTO();
$centroAutomotivoDTO->setNomeFantasia($nomefantasia);
$centroAutomotivoDTO->setRazaoSocial($razaosocial);
$centroAutomotivoDTO->setCnpj($cnpjff);
$centroAutomotivoDTO->setIe($ie);
$centroAutomotivoDTO->setLogradouro($logradouro);
$centroAutomotivoDTO->setCep($cepff);
$centroAutomotivoDTO->setNumero($numero);
$centroAutomotivoDTO->setBairro($bairro);
$centroAutomotivoDTO->setCidade($cidade);
$centroAutomotivoDTO->setEstado($estado);
$centroAutomotivoDTO->setServicos($servicos);
$centroAutomotivoDTO->setEmail($emailcentroautomotivo);
$centroAutomotivoDTO->setTelefone($telefoneff);
$centroAutomotivoDTO->setDataentrada($data);


//instanciar o objeto DAO
$centroAutomotivoDAO = new CentroAutomotivoDAO();
if($centroAutomotivoDAO->cadastrarCentroAutomotivo($empregadoDTO, $centroAutomotivoDTO)){
    header("location: ../view/situation.php");
    exit();
}else {
    echo "<h1>Não foi possivel</h1>";
    var_dump($centroAutomotivoDAO);
}