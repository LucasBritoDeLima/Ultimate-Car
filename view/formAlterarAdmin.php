<?php
session_start();
    require_once '../includes/header.php';
    require_once '../includes/validaCep.php';
?>
<?php 
require_once '../dao/AdministradorDAO.php';
$idAdministrador = $_GET["id"];
$administradorDAO = new AdministradorDAO();
$perfil = '1';
$adm = $administradorDAO->listarAdministradorById($perfil,$idAdministrador);

?>
<div class="container mb-5">
<h1 class="text-center text">Alterar Administrador</h1>
<small style="font-size: 8pt;" class="text">campos com (*) são obrigatórios</small>    
<form method="post" action="../controller/AlterarAdmController.php" onsubmit="return verificaSenha();">
    <br>
    <input type="hidden" name="idadm" value="<?php echo $idAdministrador;?>" />
    <div class="form-group">
        <div class="row">
            <div class="col-6">
            <label class="text">Nome Completo<sup>*</sup></label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?php echo $adm["nome"]; ?>"/>
            </div>
            <div class="col-6">
                <label class="text">Email<sup>*</sup></label>
                <input type="email" name="email" id="email" class="form-control" required value="<?php echo $adm["email"];?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label class="text">Celular<sup>*</sup></label>
                <input type="text" name="cel" id="cel" class="form-control" required onkeyup="mascara('(##)#####.####',this,event,true)" placeholder="(##)#####-####" value="<?php echo $adm["telefone"]; ?>"/>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <label>Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required value="<?php echo $adm["senha"]?>"/>
            </div>
            <div class="col-6">
                <label>Confirme a senha</label>
                <input type="password" name="senha2" id="senha2" class="form-control" required value="<?php echo $adm["senha"]?>"/>
            </div>
        </div>
        <div class="row">
            <div id="msg" class="text-center"></div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary" type="submit" style="margin-top: 15px;">Alterar</button>
        </div>
    </div>
    </form>
</div>
<script src="../js/validaNumero.js" type="text/javascript"></script>
<script>
var senha = document.getElementById("senha");
var senha2 = document.getElementById("senha2");
var div = document.getElementById("msg");
function verificaSenha(){
    if(senha.value != senha2.value){
        div.innerHTML = "<p class='text text-center' style='color: red'>AS SENHAS NÃO CONFEREM</p>";
        return false;
    }
    if(senha.value.length && senha2.value.length < 6){
        div.innerHTML = "<p class='text text-center' style='color: red'>A SENHA DEVE TER PELO MENOS 6 CARACTERES</p>";
        return false;
    }
    return true;
}
</script>
<?php 
require_once '../includes/footer.php';
?>