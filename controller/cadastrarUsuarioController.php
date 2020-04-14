<?php
require_once '../dao/ClienteDAO.php';
require_once '../dto/ClienteDTO.php';
require_once '../dto/UsuarioDTO.php';

//Recuperar as variaveis do form
//isso vai para o clienteDTO
$nome=$_POST["nome"];
$sobrenome=$_POST["sobrenome"];
$logradouro=$_POST["logradouro"];
$numero=$_POST["numero"];
$cep=$_POST["cep"];
$bairro=$_POST["bairro"];
$estado=$_POST["estado"];
$cidade=$_POST["cidade"];
$telefone=$_POST["telefone"];
$nomeCompleto = $nome." ".$sobrenome;
//isso vai para o usuario dto
$email=$_POST["email"];
$senha=md5($_POST["senha"]);
$data = date("Y/m/d");

//Tratamento de strings
$chars = array(".","(",")"," ","-",",",".","/","\\","..");
$ne = str_replace($chars,"",$telefone);
$cepf = str_replace($chars,"" ,$cep);
$telefonef = str_replace($chars,"" ,$telefone);

$telefoneff = str_replace(".", "", $telefonef);
$cepff = str_replace(".", "", $cepf);

//Instanciar o objeto usuarioDTO
$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setUsuario($email);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setNome($nomeCompleto);
$usuarioDTO->setEmail($email);
$usuarioDTO->setTelefone($telefoneff);
$usuarioDTO->setDataCadastro($data);
$usuarioDTO->setPerfilId("2");
//Instanciar o objeto clientedto
$clienteDTO = new ClienteDTO();
$clienteDTO->setLogradouro($logradouro);
$clienteDTO->setNumero($numero);
$clienteDTO->setCep($cepff);
$clienteDTO->setBairro($bairro);
$clienteDTO->setEstado($estado);
$clienteDTO->setCidade($cidade);
//Intanciar o clienteDAO
$clienteDAO = new ClienteDAO();

if ($clienteDAO->cadastrarCliente($usuarioDTO, $clienteDTO)){
    header("location: ../view/situation.php");
    exit();
} else{
    echo "<br>";
    var_dump($clienteDAO);
}


