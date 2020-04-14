<?php
session_start();
$perfil = isset($_SESSION["perfil"])? ($_SESSION["perfil"]) : "";
#Requisição dos arquivos a serem manipulados
require_once '../dto/EmpregadoDTO.php';
require_once '../dao/EmpregadoDAO.php';
require_once '../dto/UsuarioDTO.php';

#Receber as variaveis do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $emailuser = $_POST["emailuser"];
    $senha = md5($_POST["senha"]);
    $transicao = $_POST["transicao"];
    
#Instanciar o EmpregadoDTO
    $usuarioDTO = new UsuarioDTO();
    $usuarioDTO->setNome($nome);
    $usuarioDTO->setEmail($email);
    $usuarioDTO->setTelefone($celular);
    $usuarioDTO->setUsuario($emailuser);
    $usuarioDTO->setSenha($senha);
    $usuarioDTO->setIdUsuario($transicao);
    

#Agora vamos finalmente atualizar os dados    
    $empregadoDAO = new EmpregadoDAO();

if($empregadoDAO->AtualizarResponsavel($usuarioDTO)){
    if($perfil == "Administrador"){
        header("location: ../view/painelAdministrador.php");
    } else {
        header("location: ../view/detalhesResponsavel.php");
    }
}else {
    var_dump($responsavelDAO);
}
