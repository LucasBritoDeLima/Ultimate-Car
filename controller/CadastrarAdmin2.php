<?php
require_once '../dao/AdministradorDAO.php';
require_once '../dto/AdministradorDTO.php';
require_once '../dto/UsuarioDTO.php';

#receber as variaveis do formulario
$nome = $_POST["nome"];
$email = $_POST["email"];
$cel = $_POST["cel"];
$senha = md5($_POST["senha"]);

#instanciar o administradordto
$administradorDTO = new AdministradorDTO();
$administradorDTO->setNome($nome);
$administradorDTO->setUsuario($email);
$administradorDTO->setEmail($email);
$administradorDTO->setTelefone($cel);
$administradorDTO->setSenha($senha);
$administradorDTO->setPerfilId("1");
$administradorDTO->setDataCadastro(date("Y-m-d"));
$administradorDAO = new AdministradorDAO();
if($administradorDAO->cadastrarAdministrador($administradorDTO)){
    header("location: ../view/painelAdministrador.php");
}else {
    echo '<b>não foi possivel cadastrar o administrador</b><br>';
    echo "<pre>";
    var_dump($administradorDAO);
    echo "</pre>";
}

