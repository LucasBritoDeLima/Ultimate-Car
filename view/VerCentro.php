<?php
session_start();
$perfil = $_SESSION["perfil"];
if ($_SESSION["perfil"] != "Administrador"){
    session_destroy();
    header("location: ../index.php");
    die;
}
require_once '../controller/validaLogin.php';
require_once '../includes/header.php';
require_once '../dao/CentroAutomotivoDAO.php';
require_once '../dao/EmpregadoDAO.php';
$idCentro = $_GET["id"];
$centroAutomotivoDAO = new CentroAutomotivoDAO();
$empregadoDAO = new EmpregadoDAO();
$auto = $centroAutomotivoDAO->listarCentroById($idCentro);
$resp1 = $empregadoDAO->listarEmpregado($idCentro);
?>
    <div class="container mb-5">
        <h5 class="text text-center">Propriedades de: <?php echo $auto["nomeFantasia"];?></h5><br>
        <div class="table-responsive-lg">
        <table class="table table-hover">
            <tr>
                <th>Nome Fantasia</th>
                <td><?php echo $auto["nomeFantasia"]?></td>
            </tr>
            <tr>
                <th>Razão Social</th>
                <td><?php echo $auto["razaoSocial"]?></td>
            </tr>
            <tr>
                <th>CNPJ</th>
                <td><?php echo $auto["cnpj"]?></td>
            </tr>
            <tr>
                <th>Incrição Estadual / CF-DF</th>
                <td><?php echo $auto["ie"]?></td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td><?php echo $auto["logradouro"]." Nº ".$auto["numero"]."<br>".$auto["bairro"]."<br>".$auto["cidade"]."-".$auto["estado"] ?></td>
            </tr>
            <tr>
                <th>CEP</th>
                <td><?php echo $auto["cep"]?></td>
            </tr>
            <tr>
                <th>Serviços</th>
                <td><?php echo $auto["servico"]?></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><?php echo $auto["email"]?></td>
            </tr>
            <tr>
                <th>Telefone</th>
                <td><?php echo $auto["telefone"]?></td>
            </tr>
            <tr>
                <th>Ações</th>
                <td><a href="formAlterarCentroAutomotivo2.php?id=<?php echo $idCentro;?>" class ="btn btn-outline-warning">Editar</a>  <a href="../controller/excluirCentroAdm.php?id=<?php echo $idCentro;?>" class="btn btn-outline-danger" onclick="return confirm('Tem certeza disso?');">Excluir</a>&nbsp;<a href="../controller/ativarAll.php?id=<?php echo $idCentro;?>" class="btn btn-outline-info" onclick="return confirm('Tem certeza disso?');">Ativar</a>&nbsp;<a href="../controller/inativarAll.php?id=<?php echo $idCentro;?>" class="btn btn-outline-secondary" onclick="return confirm('Tem certeza disso?');">Inativar</a></td>
            </tr>
        </table>
        </div><br>
        <h5 class="text text-center">Responsáveis de <?php echo $auto["nomeFantasia"]?></h5>
            <div class="table-responsive-lg">
            <?php 
            echo "<p class='text text-right'>"."<b>"."Número de responsaveis: "."</b>".count($resp1)."</p>"."<br/>";
            ?>
            <?php
           echo "<table class='table table-striped'>";
           echo "<thead>";
           echo "<tr>";
           echo "<th scope='col'><p class='text-center'>Nome</p></th>";
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
                echo "<td scope='row' class='text-center'>"."{$funcionario['celular']}"."</td>";
                echo "<td scope='row' class='bg-warning text-center'><p class='text-center' style='font-size: 20px; color:#4a3c29;'><a href='AlterarDetalhesResponsavel.php?id={$funcionario["usuario_idUsuario"]}'><i class='fas fa-edit'</i></p></a></td>";
                    if(count($resp1) == 1){
                echo "<td scope='row' class='bg-danger text-center'><p class='text-center' style='font-size: 20px; color:#410352;'><i class='fas fa-trash'</i></p></td>";
                    }else{
                echo "<td scope='row' class='bg-danger text-center'><p class='text-center' style='font-size: 20px; color:#410352;'><a href='../controller/excluirResponsavelController.php?id={$funcionario["usuario_idUsuario"]}&idE={$funcionario["centroautomotivo_idCentro"]}'><i class='fas fa-trash'</i></a></p></td>";
                    }
                echo "</tbody>";
           }
           echo "</table>";
           ?>
            </div><br>
        <h3 class="text text-center">Adicionar Responsável</h3>
        <hr>
        <div class="form-group">
            <form method="POST" action="../controller/formCadastrarResponsavelAdm.php" onsubmit="return verificaSenha();">
            <input type="hidden" value="<?php echo $idCentro; ?>" name="idcentroautomotivo"/>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Nome</label>
                    <input type="text" name="nome" class="form-control" required/>
                </div>
                <div class="col-sm">
                        <label class="text">Sobrenome</label>
                        <input type="text" name="sobrenome" class="form-control" required/>
                </div>
                <div class="col-sm">
                    <label class="text">Celular</label>
                    <input type="text" name="cel" class="form-control" required onkeyup="mascara('(##)#####.####',this,event)" placeholder="(##)#####.####"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text text-center">E-mail</label>
                    <input type="email" name="email" class="form-control" required/>
                </div>
                <div class="col-sm">
                    <label class="text">Senha</label>
                    <input type="password" class="form-control" required id="senha" name="senha"/>
                </div>
                <div class="col-sm">
                    <label class="text">Confirme a senha</label>
                    <input type="password" class="form-control" required id="senha2" name="senha2"/>
                </div>
            </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Cadastrar Responsável</button>
                    </div>
                    <div class="col-sm">
                        <div id="msg"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="../js/mascara.min.js" type="text/javascript"></script>
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
<script src="../js/validaNumero.js"></script>
<?php 
require_once '../includes/footer.php';
?>

