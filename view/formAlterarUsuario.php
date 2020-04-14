<?php
session_start();
    require_once '../includes/header.php';
    require_once '../includes/validaCep.php';
    require_once '../controller/validaLogin.php';
?>
<?php 
require_once '../dao/UsuarioDAO.php';
$idUsuario = $_GET["id"];
$UsuarioDAO = new UsuarioDAO;
$usuario = $UsuarioDAO->listarUsuarioById($idUsuario);
?>
    <div class="container mb-5">
        <div class="container mb-5">
            <h1 class="text-center text">Alterar Conta</h1>
            <small style="font-size: 8pt;" class="text">campos com (*) são obrigatórios</small>
        </div>
    </div>
<form method="post" action="../controller/AlterarUsuarioController.php" onsubmit="return verificaSenha();"/>
    <input type="hidden" name="idusuario" value="<?php echo $idUsuario?>"/>    
    <div class="container mb-5">
        <div class="form-group">
            <label class="text">Nome Completo<sup>*</sup></label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?php echo $usuario["nome"]?>"/>
            <div class="row">
                <div class="col-sm">  
                    <label class="text">CEP<sup>*</sup></label>
                    <input type="text" name="cep" id="cep" class="form-control" required value="<?php echo $usuario["cep"]?>" onkeyup="somenteNumeros(this);"/>
                </div>
                <div class="col-sm">
                    <label class="text">Logradouro<sup>*</sup></label>
                    <input type="text" name="logradouro" id="rua" class="form-control" required value="<?php echo $usuario["logradouro"]?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Número<sup>*</sup></label>
                    <input type="text" name="numero" id="numero" class="form-control" required value="<?php echo $usuario["numero"]?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Bairro<sup>*</sup></label>
                    <input type="text" name="bairro" id="bairro" class="form-control" required value="<?php echo $usuario["bairro"]?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Estado<sup>*</sup></label>
                    <input type="text" name="estado" id="uf" size="2" class="form-control text-center" required value="<?php echo $usuario["estado"]?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Cidade<sup>*</sup></label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required value="<?php echo $usuario["cidade"]?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Telefone<sup>*</sup></label>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-alt" style="font-size: 20px;"></i></span>
                        </div>
                        <input type="text" class="form-control" id="telefone" name="telefone" required value="<?php echo $usuario["telefone"]?>" onkeyup="somenteNumeros(this);">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <hr>
                    <h5 class="text text-center">Usuário e senha</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">E-mail<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        </div>
                       <input type="email" class="form-control" id="email" name="email" required value="<?php echo $usuario["usuario"]?>">
                    </div>
                </div>
                <div class="col-sm">
                    <label class="text">Senha<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-lock" style="font-size: 20px"></i></span>
                        </div>
                        <input type="password" class="form-control" id="senha" name="senha" required value="<?php echo $usuario["senha"]?>">
                    </div>
                </div>
                <div class="col-sm">
                    <label class="text">Confirmar a senha<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-lock" style="font-size: 20px"></i></span>
                        </div>
                        <input type="password" class="form-control" id="senha2" name="senha2" required value="<?php echo $usuario["senha"]?>">
                        <div id="msg"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm" align="center">
                    <br>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    <!--<input type="submit"  value="Criar Conta" class="btn btn-primary"/>-->
                </div>
            </div>
        </div>
        </div>
    </form>
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
<script src="../js/validaNumero.js" type="text/javascript"></script>
<?php 
require_once '../includes/footer.php';
?>