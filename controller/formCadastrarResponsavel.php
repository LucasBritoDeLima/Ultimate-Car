<?php
    require_once '../dao/EmpregadoDAO.php';
    require_once '../dto/EmpregadoDTO.php';
    require_once '../dao/UsuarioDAO.php';
    require_once '../dto/UsuarioDTO.php';

#receber as variaveis do form
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $emailuser = $_POST["emailuser"];
    $senha = md5($_POST["senha"]);
    $idCentroAutomotivo = $_POST["idcentroautomotivo"];
    
#Instanciar o objeto usuarioDTO
    $usuarioDTO = new UsuarioDTO();
    $usuarioDTO->setNome($nome);
    $usuarioDTO->setUsuario($email);
    $usuarioDTO->setTelefone($celular);
    $usuarioDTO->setEmail($emailuser);
    $usuarioDTO->setSenha($senha);
    $usuarioDTO->setPerfilId("3");
    $usuarioDTO->setDataCadastro(date("Y-m-d"));
    
#Instanciar o objeto EmpregadoDAO
    $empregadoDAO = new EmpregadoDAO();
    
    if($empregadoDAO->cadastrarEmp($usuarioDTO, $idCentroAutomotivo)){
    header("location: ../view/detalhesResponsavel.php");
    exit();
    }else{
        var_dump($responsavelDAO);
    }