<?php
session_start();
$perfil = $_SESSION["perfil"];
if ($_SESSION["perfil"] != "Administrador") {
    session_destroy();
    header("location: ../index.php");
    die;
}
require_once '../controller/validaLogin.php';
require_once '../includes/header.php';
require_once '../dao/UsuarioDAO.php';
$idUsuario = $_GET["id"];
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listarUsuarioById($idUsuario);
?>
<div class="container mb-5">
    <h5 class="text text-center">Propriedades de: <?php echo $usuarios["nome"]; ?></h5><br>
    <small><a href="painelAdministrador.php">&lt;&lt;Voltar ao painel</a></small>
    <div class="table-responsive-lg" style="margin-top: 20px;">
        <table class="table table-hover">
            <tr>
                <th>Nome Completo</th>
                <td><?php echo $usuarios["nome"]; ?></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><?php echo $usuarios["usuario"] ?></td>
            </tr>
            <tr>
                <th>Telefone</th>
                <td><?php echo $usuarios["telefone"] ?></td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td><?php echo $usuarios["logradouro"] . " Nº " . $usuarios["numero"] . "<br>" . $usuarios["bairro"] . "<br>" . $usuarios["cidade"] . "-" . $usuarios["estado"] ?></td>
            </tr>
            <tr>
                <th>CEP</th>
                <td><?php echo $usuarios["cep"] ?></td>
            </tr>
            <tr>
                <th>Situação</th>
                <td><?php if ($usuarios["situacao"] == "0"){echo "Inativo";}else {echo "Ativo"; } ?></td>
            </tr>
            <tr>
                <th>Ações</th>
                <td><a href="formAlterarUsuarioAdm.php?id=<?php echo $idUsuario; ?>" class="btn btn-outline-warning">Editar</a>  <a href="../controller/excluirUsuarioAdm.php?id=<?php echo $idUsuario; ?>&idC=<?php echo $usuarios["usuario_idUsuario"] ?>" class="btn btn-outline-danger" onclick="return confirm('Deseja realmente excluir esta conta?')">Excluir</a>&nbsp;<a href="../controller/inativarUser.php?id=<?php echo $idUsuario; ?>" class="btn btn-outline-info">Inativar</a>&nbsp;<a href="../controller/ativarUser.php?id=<?php echo $idUsuario; ?>" class="btn btn-outline-secondary">Ativar</a></td>
            </tr>
        </table>
    </div><br>
</div>
<script src="../js/mascara.min.js" type="text/javascript"></script>
<script>
                    var senha = document.getElementById("senha");
                    var senha2 = document.getElementById("senha2");
                    var div = document.getElementById("msg");
                    function verificaSenha() {
                        if (senha.value != senha2.value) {
                            div.innerHTML = "<p class='text text-center' style='color: red'>AS SENHAS NÃO CONFEREM</p>";
                            return false;
                        }
                        if (senha.value.length && senha2.value.length < 6) {
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

