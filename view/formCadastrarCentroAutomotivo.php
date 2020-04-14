<?php
    require_once '../includes/header.php';
    require_once '../includes/validaCep.php';
?>
    <div class="container mb-5">
        <div class="container mb-5">
            <h1 class="text-center text">Criar Conta - Centro Automotivo</h1>
            <small style="font-size: 8pt;" class="text">campos com (*) são obrigatórios</small>
        </div>
    </div>
<form method="post" action="../controller/cadastrarCentroAutomotivoController.php" onsubmit="return verificaSenha();return verificaEmail();"/>
        <div class="container mb-5">
        <div class="form-group">
            <hr>
            <h5 class="text text-center">Dados do Responsável</h5>
            <hr>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Nome<sup>*</sup></label>
                        <input type="text" name="responsavel" id="resp" class="form-control" required/>    
                </div>
                <div class="col-sm">
                    <label class="text">Sobrenome<sup>*</sup></label>
                    <input type="text" name="sobrenome" id="sobrenome" class="form-control" required/>
                </div>
                <div class="col-sm">
                    <label class="text">Celular<sup>*</sup></label>
                    <input type="text" name="celularresp" id="celular" class="form-control" required onkeyup="mascara('(##)#####.####', this, event, true)"/>
                </div>
            </div>
            <hr>
            <h5 class="text text-center">Centro Automotivo</h5>
            <hr>
            <label class="text">Nome Fantasia<sup>*</sup></label>
            <input type="text" name="nomefantasia" id="nf" class="form-control" required/>
            <label class="text">Razão Social<sup>*</sup></label>
            <input type="text" name="razaosocial" id="rs" class="form-control" required/>            
            <div class="row">
                <div class="col-sm">
                    <label class="text">CNPJ<sup>*</sup></label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control" required onkeyup="mascara('##.###.###/####-##', this, event, true)"/>
                </div>
                <div class="col-sm">
                    <label class="text">Inscrição Estadual(CF-DF)<sup>*</sup></label>
                    <input type="text" name="ie" id="ie" class="form-control" required onkeyup="somenteNumeros(this);"/>                
                </div>
            </div>
            <div class="row">
                <div class="col-sm">  
                    <label class="text">CEP<sup>*</sup></label>
                    <input type="text" name="cep" id="cep" class="form-control" required onkeyup="mascara('##.###-###', this, event, true)"/>
                </div>
                <div class="col-sm">
                    <label class="text">Logradouro<sup>*</sup></label>
                    <input type="text" name="logradouro" id="rua" class="form-control" required/>
                </div>
                <div class="col-sm">
                    <label class="text">Número<sup>*</sup></label>
                    <input type="text" name="numero" id="numero" class="form-control" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Bairro<sup>*</sup></label>
                    <input type="text" name="bairro" id="bairro" class="form-control" required/>
                </div>
                <div class="col-sm">
                    <label class="text">Estado<sup>*</sup></label>
                    <input type="text" name="estado" id="uf" size="2" class="form-control text-center" required/>
                </div>
                <div class="col-sm">
                    <label class="text">Cidade<sup>*</sup></label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Telefone<sup>*</sup></label>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-alt" style="font-size: 20px;"></i></span>
                        </div>
                        <input type="text" class="form-control" id="telefone" name="telefone" required onkeyup="mascara('(##)####-####', this, event, true)">
                    </div>
                </div>
                <div class="col-sm">
                    <label>Celular<sup>*</sup></label>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-alt" style="font-size: 20px;"></i></span>
                        </div>
                        <input type="text" class="form-control" id="celular" name="celular" required onkeyup="mascara('(##)#####-####', this, event, true)">
                    </div>                
                </div>
                <div class="col-sm">
                    <label class="text">E-mail do Centro Automotivo<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        </div>
                       <input type="text" class="form-control" id="emailcentroautomotivo" name="emailcentroautomotivo" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <hr>
                    <h5 class="text text-center">Descrição dos Serviços</h5>
                    <hr>
                    <div class="row">
                        <div class="col-sm">
                            <label>Descrição dos serviços:<sup>*</sup></label>
                            <textarea class="form-control" id="servico" rows="3" name="servico"></textarea>
                        </div>
                    </div>
                    <hr>
                    <h5 class="text text-center">Usuário e senha - Responsável</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">E-mail do responsável<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        </div>
                       <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-sm">
                    <label class="text">Senha<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-lock" style="font-size: 20px"></i></span>
                        </div>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                </div>
                <div class="col-sm">
                    <label class="text">Confirmar a senha<sup>*</sup></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-lock" style="font-size: 20px"></i></span>
                        </div>
                        <input type="password" class="form-control" id="senha2" name="senha2" required>
                        <div id="msg"></div>
                    </div>
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
var email = document.getElementById("emailcentroautomotivo");
var email2 = document.getElementById("email");
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
function verificaEmail(){
    if(email.value == email2.value){
        div.innerHTML = "<p class='text text-center' style='color: red'>OS EMAILS NÃO PODEM SER IGUAIS</p>";
        return false;
        }
    return true;
}
</script>
<script src="../js/validaNumero.js" type="text/javascript"></script>
<script src="../js/mascara.min.js" type="text/javascript"></script>
<?php 
require_once '../includes/footer.php';
?>