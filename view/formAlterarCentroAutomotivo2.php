<?php
session_start();
    require_once '../includes/header.php';
    require_once '../includes/validaCep.php';
    require_once '../controller/validaLogin.php';
?>
<?php
require_once '../dao/CentroAutomotivoDAO.php';
$idCentroAutomotivo = $_GET["id"];
$centroAutomotivoDAO = new CentroAutomotivoDAO();
$centro = $centroAutomotivoDAO->listarCentroById($idCentroAutomotivo);
?>
 
    <div class="container mb-5">
        <div class="container mb-5">
            <h1 class="text-center text">Alterar Conta - Centro Automotivo</h1>
            <small style="font-size: 8pt;" class="text">campos com (*) são obrigatórios</small>
        </div>
    </div>
<form method="post" action="../controller/AlterarCentroAutomotivoControllerAdm.php" onsubmit="return verificaSenha();"/>
    <input type="hidden" name="idcentroautomotivo" value="<?php echo $idCentroAutomotivo?>"/>        
<div class="container mb-5">
        <div class="form-group">
            <label class="text">Nome Fantasia<sup>*</sup></label>
            <input type="text" name="nomefantasia" id="nf" class="form-control" required value="<?php echo $centro['nomeFantasia'];?>"/>
            <label class="text">Razão Social<sup>*</sup></label>
            <input type="text" name="razaosocial" id="rs" class="form-control" required value="<?php echo $centro['razaoSocial'];?>"/>            
            <div class="row">
                <div class="col-sm">
                    <label class="text">CNPJ<sup>*</sup></label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control" required onkeyup="somenteNumeros(this);" value="<?php echo $centro['cnpj'];?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Inscrição Estadual(CF-DF)<sup>*</sup></label>
                    <input type="text" name="ie" id="ie" class="form-control" required onkeyup="somenteNumeros(this);" value="<?php echo $centro['ie'];?>"/>                
                </div>
            </div>
            <div class="row">
                <div class="col-sm">  
                    <label class="text">CEP<sup>*</sup></label>
                    <input type="text" name="cep" id="cep" class="form-control" required onkeyup="somenteNumeros(this);" value="<?php echo $centro['cep'];?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Logradouro<sup>*</sup></label>
                    <input type="text" name="logradouro" id="rua" class="form-control" required value="<?php echo $centro['logradouro'];?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Número<sup>*</sup></label>
                    <input type="text" name="numero" id="numero" class="form-control" required value="<?php echo $centro['numero'];?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Bairro<sup>*</sup></label>
                    <input type="text" name="bairro" id="bairro" class="form-control" required value="<?php echo $centro['bairro'];?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Estado<sup>*</sup></label>
                    <input type="text" name="estado" id="uf" size="2" class="form-control text-center" required value="<?php echo $centro['estado'];?>"/>
                </div>
                <div class="col-sm">
                    <label class="text">Cidade<sup>*</sup></label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required value="<?php echo $centro['cidade'];?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Telefone<sup>*</sup></label>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-alt" style="font-size: 20px;"></i></span>
                        </div>
                        <input type="text" class="form-control" id="telefone" name="telefone" required  onkeyup="somenteNumeros(this);" value="<?php echo $centro['telefone'];?>"/>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm">
                    <hr>
                    <h5 class="text text-center">Descrição dos Serviços</h5>
                    <div class="row">
                        <div class="col-sm">
                            <label>Descrição dos serviços:</label>
                            <textarea class="form-control" id="servico" rows="3" name="servico"><?php echo $centro['servico'];?></textarea>
                        </div>
                    </div>
                    <hr>
                    <h5 class="text text-center">Usuário e senha</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <label class="text">E-mail do centro automotivo<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        </div>
                       <input type="text" class="form-control" id="email" name="email" required value="<?php echo $centro['email'];?>">
                    </div>
                </div>
                <div class="col-sm">

                </div>
            </div>
            <div class="row">
                <div class="col-sm" align="center">
                    <br>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
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