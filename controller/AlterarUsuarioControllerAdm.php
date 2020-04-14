<?php
session_start();
require_once '../dto/ClienteDTO.php';
require_once '../dto/UsuarioDTO.php';
require_once '../dao/ClienteDAO.php';

#receber as variaveis do formulário
$idUsuario = $_POST["idusuario"];
$nome=$_POST["nome"];
$logradouro=$_POST["logradouro"];
$numero=$_POST["numero"];
$cep=$_POST["cep"];
$bairro=$_POST["bairro"];
$estado=$_POST["estado"];
$cidade=$_POST["cidade"];
$telefone=$_POST["telefone"];
$email=$_POST["email"];
$senha=md5($_POST["senha"]);

#instanciar o objeto usuariodto
$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setUsuario($email);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setNome($nome);
$usuarioDTO->setEmail($email);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setIdUsuario($idUsuario);

#instanciar o objeto clientedto
$clienteDTO = new ClienteDTO();
$clienteDTO->setLogradouro($logradouro);
$clienteDTO->setCep($cep);
$clienteDTO->setNumero($numero);
$clienteDTO->setBairro($bairro);
$clienteDTO->setCidade($cidade);
$clienteDTO->setEstado($estado);
$clienteDTO->setUsuario_idUsuario($idUsuario);

#instanciar o objeto clientedao

$clienteDAO = new ClienteDAO();
#condicao principal
if($clienteDAO->atualizar($usuarioDTO, $clienteDTO)){
echo "<script>";
echo "    window.location.href='../view/VerCliente.php?id={$idUsuario}';";
echo "</script>";

}else{
    die("Erro ao editar o usuario");
}
