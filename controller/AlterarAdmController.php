<?php
session_start();
require_once '../dto/AdministradorDTO.php';
require_once '../dto/UsuarioDTO.php';
require_once '../dao/AdministradorDAO.php';

#receber as variaveis do formulário
$idAdm = $_POST["idadm"];
$nome=$_POST["nome"];
$cel=$_POST["cel"];
$email=$_POST["email"];
$senha=md5($_POST["senha"]);

#Instanciar a classe AdministradorDTO
$administradorDTO = new AdministradorDTO();
$administradorDTO->setNome($nome);
$administradorDTO->setUsuario($email);
$administradorDTO->setSenha($senha);
$administradorDTO->setEmail($email);
$administradorDTO->setTelefone($cel);
$administradorDTO->setIdUsuario($idAdm);
$administradorDAO = new AdministradorDAO();
#condicao principal
if($administradorDAO->atualizar($administradorDTO)){
echo "<script>";
echo "    window.location.href='../view/painelAdministrador.php';";
echo "</script>";

}else{
    die("Erro ao editar o usuario");
}
