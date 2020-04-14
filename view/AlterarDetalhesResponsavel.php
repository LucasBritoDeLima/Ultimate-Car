<?php 
session_start();
require_once '../controller/validaLogin.php';
require_once '../dao/CentroAutomotivoDAO.php';
require_once '../dao/EmpregadoDAO.php';
$idFuncionario = $_GET["id"];
$empregadoDAO = new EmpregadoDAO();
$listaResp = $empregadoDAO->listarResponsavelById($idFuncionario);
?>
<?php 
    include_once '../includes/header.php';
?>
<div class="container mb-5">
    <h1 class="text text-center">Editar Empregado</h1>
    <h6 class="text text-center"><b>Alterar</b></h6>
    <br>
            <br>
        <div class="accordion" id="accordionExample">
          <div class="card border-bottom">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fas fa-address-card"></i>&nbsp;Editar o Responsável
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                  <h4 class="text text-center">Responsável<sup>*</sup></h4>
                  <form method="POST" action="../controller/AlterarDetalhesResponsavelController.php" onsubmit="return verificaSenha();"> 
                     <input type="hidden" id="id" name="transicao" value="<?php echo $idFuncionario; ?>">
                      <div class="container mb-5">
                      <div class="form-group">
                          <div class="row">
                              <div class="col-sm">
                                  <label class="text">Nome</label>
                                  <input type="text" name="nome" class="form-control" required value="<?php echo $listaResp["nome"]; ?>"/> 
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm">
                                  <label class="text">Email</label>
                                  <input type="email" name="email" class="form-control" required value="<?php echo $listaResp["email"]?>"/>
                              </div>
                              <div class="col-sm">
                                  <label>Celular:</label>
                                  <input type="text" name="celular" class="form-control" required value="<?php echo $listaResp["telefone"];?>"/>
                              </div>
                          </div>
                          <hr>
                          <h5 class="text text-center">Usuário e senha</h5>
                          <hr>
                          <div class="row">
                              <div class="col-sm">
                                  <label>E-mail</label>
                                  <input type="email" name="emailuser" class="form-control" required value="<?php echo $listaResp["usuario"]; ?>"/>
                              </div>
                              <div class="col-sm">
                                  <label>Senha</label>
                                  <input type="password" name="senha" id="senha" class="form-control" required value="<?php echo $listaResp["senha"]; ?>"/>
                              </div>
                              <div class="col-sm">
                                  <label>Confirme a senha</label>
                                  <input type="password" name="senha2" id="senha2" class="form-control" required value="<?php echo $listaResp["senha"]; ?>"/>
                              </div>
                          </div>
                          <br>
                          <div id="msg"></div>
                          <p class="text-center"><input type="submit" class="btn btn-primary" value="Cadastrar"></p>
                      </div>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div></div>
        </div></div>
        </div>
</div></div>
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
    if(senha.value=="" && senha2.value==""){
        div.innerHTML = "<p class='text text-center' style='color: red'>A SENHA NÃO PODE FICAR EM BRANCO</p>";
        return false;
    }
    return true;
}
</script>
<script src="../js/validaNumero.js" type="text/javascript"></script>
<?php 
include_once '../includes/footer.php';
?>
