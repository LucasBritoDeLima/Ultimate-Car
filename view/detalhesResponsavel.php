<?php 
session_start();
require_once '../controller/validaLogin.php';
require_once '../dao/CentroAutomotivoDAO.php';
require_once '../dao/EmpregadoDAO.php';
$empregadoDAO = new EmpregadoDAO();
$emp = $empregadoDAO->mostrarEmp($_SESSION["usuario"]);
$centroAutomotivoDAO = new CentroAutomotivoDAO();
$idCentroAutomotivo = $_SESSION["centroautomotivo_idCentro"];
$resp1 = $empregadoDAO->listarEmpregado($idCentroAutomotivo);
$dados = $centroAutomotivoDAO->listarCentroById($idCentroAutomotivo);
$msgex = isset($_GET["msg"])? $_GET["msg"] : "";
?>
<?php 
    include_once '../includes/header.php';
?>
<div class="container mb-5">
    <?php if(!empty($_GET["msg"])){?>
    <div class="alert alert-success" role="alert">
    <?php echo $msgex; ?>
    </div><?php } ?>
    <h1 class="text text-center">Gerenciamento de responsável</h1>
    <h6 class="text text-center">Adicionar - Alterar - Excluir</h6>
    <br>
        <p class="text-center">
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Listar Responsável
        </a>
        </p>
        <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="modal-body" style="overflow: auto;">
            <?php 
                echo "<p class='text text-right'>"."<b>"."Número de responsaveis: "."</b>".count($resp1)."</p>"."<br/>";
            ?>
            <?php
           echo "<table class='table table-striped'>";
           echo "<thead>";
           echo "<tr>";
           echo "<th scope='col'><p class='text-center'>Nome Completo</p></th>";
           echo "<th scope='col'><p class='text-center'>Email</p></th>";
           echo "<th scope='col'><p class='text-center'>Celular</p></th>";
           echo "<th scope='col' class='table-warning'><p class='text-center'>Editar</p></th>";
           echo "<th scope='col' class='table-danger'><p class='text-center'>Excluir</p></th>";
           echo "</tr>";
           echo "</thead>";
           foreach ($resp1 as $funcionario) {
               echo "<tbody>";
                echo "<td scope='row' class='text-center'>"."{$funcionario['nome']}"."</td>";
                echo "<td scope='row' class='text-center'>"."{$funcionario['emailUser']}"."</td>";
                echo "<td scope='row' class='text-center'>"."{$funcionario['telefone']}"."</td>";
                echo "<td scope='row' class='bg-warning text-center'><p class='text-center' style='font-size: 20px; color:#4a3c29;'><a href='AlterarDetalhesResponsavel.php?id={$funcionario["usuario_idUsuario"]}'><i class='fas fa-edit'</i></p></a></td>";
                    if(count($resp1) == 1){
                echo "<td scope='row' class='bg-danger text-center'><p class='text-center' style='font-size: 20px; color:#410352;'><i class='fas fa-trash'</i></p></td>";
                    }else{
                echo "<td scope='row' class='bg-danger text-center'><p class='text-center' style='font-size: 20px; color:#410352;'><a href='../controller/excluirResponsavelController.php?id={$funcionario["usuario_idUsuario"]}' onclick=\"return confirm('Tem Certeza?')\"><i class='fas fa-trash'</i></a></p></td>";
                    }
                echo "</tbody>";
           }
           echo "</table>";
           ?>
            </div>
            <br>
        </div>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="card border-bottom">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <?php if (count($resp1) <= 5){?>
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fas fa-address-card"></i>&nbsp;Adicionar novo Responsável
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                  <h4 class="text text-center">Responsável<sup>*</sup></h4>
                  <form method="POST" action="../controller/formCadastrarResponsavel.php" onsubmit="return verificaSenha();">
                  <div class="container mb-5">
                      <div class="form-group">
                          <div class="row">
                              <div class="col-sm">
                                  <label class="text">Nome Completo</label>
                                  <input type="text" name="nome" class="form-control" required/> 
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm">
                                  <label class="text">Email</label>
                                  <input type="email" name="email" class="form-control" required/>
                              </div>
                              <div class="col-sm">
                                  <label>Celular:</label>
                                  <input type="text" name="celular" class="form-control" required/>
                              </div>
                          </div>
                          <hr>
                          <h5 class="text text-center">Usuário e senha</h5>
                          <hr>
                          <div class="row">
                              <div class="col-sm">
                                  <label>E-mail</label>
                                  <input type="email" name="emailuser" class="form-control" required/>
                              </div>
                              <div class="col-sm">
                                  <label>Senha</label>
                                  <input type="password" name="senha" id="senha" class="form-control" required/>
                              </div>
                              <div class="col-sm">
                                  <label>Confirme a senha</label>
                                  <input type="password" name="senha2" id="senha2" class="form-control" required/>
                              </div>
                          </div>
                          <br>
                          <input type="hidden" name="idcentroautomotivo" value="<?php echo $idCentroAutomotivo;?>"/>
                          <div id="msg"></div>
                          <p class="text-center"><input type="submit" class="btn btn-primary" value="Cadastrar"></p>
                      </div>
                  </div>
                  </form>
              </div>
                </div><?php } else { ?> <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fas fa-address-card"></i>&nbsp;Adicionar novo Responsável
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                  <h4 class="text text-center">Responsável<sup>*</sup></h4>
                  <form method="POST" action="../controller/formCadastrarResponsavel.php" onsubmit="return verificaSenha();">
                  <div class="container mb-5">
                      <div class="form-group">
                          <div class="row">
                              <div class="col-sm">
                                  <label class="text">Nome</label>
                                  <input type="text" name="nome" class="form-control" required readonly/> 
                              </div>
                              <div class="col-sm">
                                  <label class="text">Sobrenome</label>
                                  <input type="text" name="sobrenome" class="form-control" required readonly/>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm">
                                  <label class="text">Email</label>
                                  <input type="email" name="email" class="form-control" required readonly/>
                              </div>
                              <div class="col-sm">
                                  <label>Celular:</label>
                                  <input type="text" name="celular" class="form-control" required readonly/>
                              </div>
                          </div>
                          <hr>
                          <h5 class="text text-center">Usuário e senha</h5>
                          <hr>
                          <div class="row">
                              <div class="col-sm">
                                  <label>E-mail</label>
                                  <input type="email" name="emailuser" class="form-control" required readonly/>
                              </div>
                              <div class="col-sm">
                                  <label>Senha</label>
                                  <input type="password" name="senha" id="senha" class="form-control" required readonly/>
                              </div>
                              <div class="col-sm">
                                  <label>Confirme a senha</label>
                                  <input type="password" name="senha2" id="senha2" class="form-control" required readonly/>
                              </div>
                          </div>
                          <br>
                          <input type="hidden" name="idcentroautomotivo" value="<?php echo $idCentroAutomotivo;?>"/>
                          <div id="msg"></div>
                          <p class="text-center"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Puxa vida!!:-(</strong> &nbsp;Não é possível cadastrar mais que seis responsáveis
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
</div></p>
                      </div>
                  </div>
                  </form>
              </div>
                </div><?php }?>
          </div>
        </div>
</div>
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
