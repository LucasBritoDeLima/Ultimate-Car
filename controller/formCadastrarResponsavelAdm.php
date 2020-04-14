<?php
    require_once '../dao/EmpregadoDAO.php';
    require_once '../dto/EmpregadoDTO.php';
    require_once '../dao/UsuarioDAO.php';
    require_once '../dto/UsuarioDTO.php';
    
#receber as variaveis do form
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $nomeCompleto = $nome." ".$sobrenome;
    $email = $_POST["email"];
    $celular = $_POST["cel"];
    $senha = md5($_POST["senha"]);
    $idCentroAutomotivo = $_POST["idcentroautomotivo"];
    $chars = array("(",")",".","-","/"); // Retirando os caracteres adicionados pelas mascaras
    $celularFormatado = str_replace($chars,"",$celular);

#Instanciar o objeto usuarioDTO
    $usuarioDTO = new UsuarioDTO();
    $usuarioDTO->setUsuario($email);
    $usuarioDTO->setSenha($senha);
    $usuarioDTO->setNome($nomeCompleto);
    $usuarioDTO->setEmail($email);
    $usuarioDTO->setTelefone($celularFormatado);
    $usuarioDTO->setDataCadastro(date("Y-m-d"));
    $usuarioDTO->setPerfilId("3");
    
#Instanciar o objeto ResponsavelDAO
    $empregadoDAO = new EmpregadoDAO();
    
if($empregadoDAO->cadastrarEmp($usuarioDTO, $idCentroAutomotivo)){
header("location: ../view/VerCentro.php?id={$idCentroAutomotivo}");
exit();
}else{
var_dump($responsavelDAO);
}