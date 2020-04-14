<?php
require_once '../dao/UsuarioDAO.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$UsuarioDAO = new UsuarioDAO();
$UsuarioDAO->logarUsuario();
