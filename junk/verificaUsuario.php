<?php
require_once '../dao/CarroDAO.php';
require_once '../dto/UsuarioDTO.php';

//receber as variaveis

$email = $_POST['email'];
$senha = $_POST['senha'];

$carroDAO = new CarroDAO;
$carroDAO->autenticarUsuario();
$usuarioDTO= new UsuarioDTO();
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);
