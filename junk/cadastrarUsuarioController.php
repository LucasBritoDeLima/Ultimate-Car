<?php
require_once '../dto/UsuarioDTO.php';
require_once '../dao/CarroDAO.php';

//recuperar o formulario
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setNome($nome);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setEmail($email);

$carroDAO = new CarroDAO();
$carroDAO->salvarUsuario($usuarioDTO);
echo "<script>";
echo "window.location.href('http://www.google.com.br')";
echo "</script>";