<?php
require_once '../dao/AdministradorDAO.php';
require_once '../dto/AdministradorDTO.php';

#receber as variaveis do formulario
$nome = $_POST["nome"];
$email = $_POST["email"];
$cel = $_POST["cel"];
$senha = md5($_POST["senha"]);
$data = date("Y/m/d");

$administradorDTO = new AdministradorDTO();
$administradorDTO->setNome($nome);
$administradorDTO->setEmail($email);
$administradorDTO->setUsuario($email);
$administradorDTO->setSenha($senha);
$administradorDTO->setTelefone($cel);
$administradorDTO->setDataCadastro($data);
$administradorDTO->setPerfilId("1");

$administradorDAO = new AdministradorDAO();
if($administradorDAO->cadastrarAdministrador($administradorDTO)){
    header("location: ../index.php");
}else {
    echo 'não foi possivel cadastrar o administrador';
    var_dump($administradorDAO);
}

