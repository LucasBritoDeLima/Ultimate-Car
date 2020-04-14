<?php
session_start();
require_once '../controller/validaLogin.php';
require_once '../dao/AdministradorDAO.php';
require_once '../dao/CentroAutomotivoDAO.php';
require_once '../dao/CarroDAO.php';
$administradorDAO = new AdministradorDAO();
$idAdministrador = $_SESSION["idUsuario"];
$administradores = $administradorDAO->listarAdministradorById(1, $idAdministrador);
$carroDAO = new CarroDAO();
$montadoras = $carroDAO->listarAllMontadoras();
?>
<?php
require_once '../includes/header.php';
?>
<?php
require_once '../dao/conexao/Conexao.php';
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
//      $conexao = Conexao::getInstance();
//	$sql = 'SELECT * FROM centroautomotivo';
//	$stm = $conexao->prepare($sql);
//	$stm->execute();
//	$autocenters = $stm->fetchAll(PDO::FETCH_OBJ);
else:
    // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
    $conexao = Conexao::getInstance();
    $sql = 'SELECT * FROM usuario WHERE nome LIKE :nome';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', '%' . $termo . '%');
    $stm->execute();
    $ad = $stm->fetchAll(PDO::FETCH_OBJ);
endif;
?>
<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="../images/img-adm.png" id="imgProfile" style="width: 150px; height: 150px; object-fit: cover" class="img-thumbnail" />
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block text" style="font-size: 1.5rem; font-weight: bold"><?php echo $administradores['nome']; ?></h2>
                                <h6 class="d-block text"><a href="mailto:<?php echo $administradores["usuario"] ?>"><?php echo $administradores["usuario"] ?></a></h6>
                                <h6 class="d-block text">Tipo de autenticação: <span class="text-warning" style="font-weight: bold"><?php echo $_SESSION["perfil"] ?></span></h6>
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (isset($_GET["termo"])) { ?>    
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Informações</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#editar" role="tab" aria-controls="connectedServices" aria-selected="false">Editar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#add" role="tab" aria-controls="connectedServices" aria-selected="false">Adicionar ADM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="connectedServices-tab" data-toggle="tab" href="#search" role="tab" aria-controls="connectedServices" aria-selected="false">Pesquisa ADM</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#autocenter" role="tab" aria-controls="connectedServices" aria-selected="false">Centro Automotivo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#user" role="tab" aria-controls="connectedServices" aria-selected="false">Usuários</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#comentario" role="tab" aria-controls="connectedServices" aria-selected="false">Comentários</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#pecas" role="tab" aria-controls="connectedServices" aria-selected="false">Peças</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#veiculo" role="tab" aria-controls="connectedServices" aria-selected="false">Veículos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#oleo" role="tab" aria-controls="connectedServices" aria-selected="false">Óleos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#filtro" role="tab" aria-controls="connectedServices" aria-selected="false">Filtros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#apagar" role="tab" aria-controls="connectedServices" aria-selected="false">Apagar Conta</a>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <div class="col-12">
                                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Informações</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#editar" role="tab" aria-controls="connectedServices" aria-selected="false">Editar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#add" role="tab" aria-controls="connectedServices" aria-selected="false">Adicionar ADM</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#search" role="tab" aria-controls="connectedServices" aria-selected="false">Pesquisa ADM</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#autocenter" role="tab" aria-controls="connectedServices" aria-selected="false">Centro Automotivo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#user" role="tab" aria-controls="connectedServices" aria-selected="false">Usuários</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#comentario" role="tab" aria-controls="connectedServices" aria-selected="false">Comentários</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#pecas" role="tab" aria-controls="connectedServices" aria-selected="false">Peças</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#veiculo" role="tab" aria-controls="connectedServices" aria-selected="false">Veículos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#oleo" role="tab" aria-controls="connectedServices" aria-selected="false">Óleos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#filtro" role="tab" aria-controls="connectedServices" aria-selected="false">Filtros</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#apagar" role="tab" aria-controls="connectedServices" aria-selected="false">Apagar Conta</a>
                                        </li>
                                    </ul>
                                <?php } ?>
                                <?php if (isset($_GET["termo"])) { ?>
                                    <div class="tab-content ml-1" id="myTabContent">
                                        <div class="tab-pane" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        <?php } else { ?>
                                            <div class="tab-content ml-1" id="myTabContent">
                                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Nome Completo</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?php echo $administradores["nome"]; ?>
                                                    </div>
                                                </div>
                                                <hr />

                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">E-mail</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?php echo $administradores["usuario"]; ?>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Celular</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?php echo $administradores["telefone"]; ?>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Data de Ingresso</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?php echo date("d/m/Y", strtotime($administradores["dataCadastro"])); ?>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Tipo de conta</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <?php echo $_SESSION["perfil"]; ?>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                <h3 class="text text-center">Adicionar Administrador</h3>
                                                <hr>
                                                <p>
                                                <p class="text text-center"><a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fas fa-plus"></i>&nbsp;Adicionar Administrador
                                                    </a></p>
                                                </p>
                                                <div class="collapse" id="collapseExample" style="padding-bottom: 10px;">
                                                    <div class="card card-body">
                                                        <h5 class="text text-center">Adicionar Responsável</h5>
                                                        <form method="post" action="../controller/CadastrarAdmin2.php" onsubmit="return verificaSenha();">
                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <label class="text">Nome completo</label>
                                                                    <input type="text" name="nome" class="form-control" required/>
                                                                </div>
                                                                <div class="col-sm">
                                                                    <label class="text">E-mail</label>
                                                                    <input type="email" name="email" class="form-control" required/>
                                                                </div>
                                                                <div class="col-sm">
                                                                    <label class="text">Celular</label>
                                                                    <input type="text" name="cel" class="form-control" required onkeyup="mascara('(##)#####.####', this, event, true)" placeholder="(##)#####-####"/>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <label class="text">Senha</label>
                                                                    <input type="password" name="senha" class="form-control" id="senha" required/>
                                                                </div>
                                                                <div class="col-sm">
                                                                    <label>Confirme a senha</label>
                                                                    <input type="password" name="senha2" class="form-control" id="senha2" required/>                                                             
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div id="msg" class="text-center"></div>
                                                            </div>
                                                            <div class="d-flex justify-content-center"><input type="submit" value="Cadastrar" class="btn btn-primary" style="margin-top:  10px;"/></div>
                                                        </form>
                                                    </div>
                                                </div>                                        
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border-bottom">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    <i class="far fa-address-card"></i>&nbsp;Listagem de Adiministradores
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <?php $listadm = $administradorDAO->listarAllAdm(1); ?>
                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body" style="overflow: auto;">
                                                                <?php
                                                                echo "<p class='text-right text'>" . "Total de Registros: " . "<b>" . count($listadm) . "</b>" . "</p>";
                                                                echo "<table class='table table-hover'>";
                                                                echo "<thead>";
                                                                echo "<tr>";
                                                                echo "<th scope='col'>" . "Nome" . "</th>";
                                                                echo "<th scope='col'>" . "Data de Cadastro" . "</th>";
                                                                echo "<th scope='col'>" . "E-mail / Usuario" . "</th>";
                                                                echo "<th scope='col'>" . "Celular" . "</th>";
                                                                echo "<th scope='col'>" . "Alterar" . "</th>";
                                                                echo "<th scope='col'>" . "Excluir" . "</th>";
                                                                echo "</thead>";
                                                                echo "<tbody>";
                                                                foreach ($listadm as $adm) {
                                                                    echo "<tr>";
                                                                    echo "<td>" . "{$adm["nome"]}" . "</td>";
                                                                    echo "<td>", date("d/m/Y", strtotime($adm["dataCadastro"])), "</td>";
                                                                    echo "<td>" . $adm["email"] . "</td>";
                                                                    echo "<td>" . $adm["telefone"] . "</td>";
                                                                    echo "<td>" . "<a class='btn btn-outline-warning' href='formAlterarAdmin.php?id={$adm["idUsuario"]}' role='button'>Editar</a>" . "</td>";
                                                                    if (count($listadm) == 1) {
                                                                        echo "<td>" . "<a class='btn btn-outline-danger' href='#' role='button' onclick=\"alert('Não se pode apagar quando tem apenas um administrador, apenas a conta inteira');\">Excluir</a>" . "</td>";
                                                                    } else {
                                                                        echo "<td>" . "<a class='btn btn-outline-danger' href='../controller/excluirAdmController.php?id={$adm["idUsuario"]}' role='button' onclick=\"return confirm('Deseja apagar o administrador do sistema?');\">Excluir</a>" . "</td>";
                                                                    }
                                                                    echo "</tr>";
                                                                    echo "</tbody>";
                                                                }
                                                                echo "</table>";
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Quando for pesquisado ir para o menu pesquisar adm-->   
                                            <?php if (isset($_GET["termo"])) { ?>
                                                <div class="tab-pane fade show active" id="search" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                <?php } else { ?>
                                                    <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="ConnectedServices-tab">                                    
                                                    <?php } ?>
                                                    <h3 class="text text-center">Pesquisar Administrador</h3>
                                                    <hr>
                                                    <h5 class="text text-center">Pesquise por Administradores</h5><br><br>
                                                    <p class="textgoogle text-center" style="font-size: 48px; font-weight: 600"><span style="color: #2379cf;">A</span><span style="color: #d93030">d</span><span style="color: #ffd930">m</span><span style="color: #2379cf">i</span><span style="color: #499c09">n</span></p>
                                                    <div class="form-group">
                                                        <form method="GET" action=""/> 
                                                        <div class="d-flex justify-content-center"><input type="text" name="termo" id="pesquisa" placeholder="Digite algo!" class="form-control" style="width: 40%;"/></div>
                                                        <p class="text-center"><button type="submit" class="btn btn-outline-primary" style="margin-top: 5px;"><i class="fas fa-search"></i>Buscar</button></p>
                                                        </form>
                                                    </div>
                                                    <br><br>
                                                    <!-- Ínicio da Pesquisa-->
                                                    <?php if (!empty($ad)): ?>
                                                        <?php foreach ($ad as $ads): ?>
                                                            <center>
                                                                <div class="card mb-3" style="max-width: 540px;">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-md-4">
                                                                            <img src="../images/img-adm.png" class="card-img img-fluid" width="150px" height="150px">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="card-body">
                                                                                <p class="card-text text-justify"><?= $ads->nome ?></p>
                                                                                <p class="card-text text-justify"><small class="text-muted"><?= $ads->email ?></small></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                        <?php endforeach; ?>
                                                        </table>
                                                    <?php else: ?>
                                                        <h3 class="text-center text-primary"></h3>
                                                    <?php endif; ?>
                                                    <!-- Fim da pesquisa-->
                                                </div>
                                                <div class="tab-pane fade" id="autocenter" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <h3 class="text text-center">Centros automotivos</h3><hr><p class="text text-center">Veja centros automotivos cadastrados no Ultimate Car</p><p>Clique no botão para mais detalhes</p>
                                                    <?php
                                                    require_once '../dao/CentroAutomotivoDAO.php';
                                                    $centroAutomotivoDAO = new CentroAutomotivoDAO();
                                                    $centros = $centroAutomotivoDAO->listarAllCentros();
                                                    ?>
                                                    <?php
                                                    if (count($centros) < 1) {
                                                        echo "<center>";
                                                        echo "<p class=\"text\" style='color: #e8e83f; background-color: #666;'>Não há centros automotivos cadastrados.<p>";
                                                        echo "</center>";
                                                    } else {
                                                        foreach ($centros as $centro) {
                                                            echo "<center>";
                                                            echo "<a href=\"VerCentro.php?id={$centro["idCentro"]}\" class=\"btn btn-primary btn-lg\" style=\"margin-bottom: 10px;\">" . $centro["nomeFantasia"] . "&nbsp;" . date("d/m/Y", strtotime($centro["dataCadastro"])) . "</a>";
                                                            echo "</center>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <h3 class="text text-center">Usuários</h3><hr><p class="text text-center">Veja usuários cadastrados no Ultimate Car</p><p>Clique no botão para mais detalhes</p>
                                                    <?php
                                                    require_once '../dao/ClienteDAO.php';
                                                    $clienteDAO = new ClienteDAO();
                                                    $clientes = $clienteDAO->listarAllClientes();
                                                    ?>
                                                    <?php
                                                    if (count($clientes) < 1) {
                                                        echo "<center>";
                                                        echo "<p class=\"text\" style='color: #e8e83f; background-color: #666;'>Não há usuários cadastrados.<p>";
                                                        echo "</center>";
                                                    } else {
                                                        foreach ($clientes as $cliente) {
                                                            echo "<center>";
                                                            echo "<a href=\"VerCliente.php?id={$cliente["idUsuario"]}\" class=\"btn btn-primary btn-lg\" style=\"margin-bottom: 5px;\">" . $cliente["nome"] . "&nbsp;" . date("d/m/Y", strtotime($cliente["dataCadastro"])) . "</a>\n<br>";
                                                            echo "</center>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="tab-pane fade" id="comentario" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <h3 class="text text-center">Comentários</h3><p class="text-center text">Utilize esse espaço para gerenciar comentários</p>
                                                    <?php
                                                    $comentarioCentro = $centroAutomotivoDAO->obterCentro();
                                                    ?>
                                                    <form method="post" action="painelAdministrador.php">
                                                        <div class="row">
                                                            <div class="col">Selecione um centro automotivo</div>
                                                            <div class="col-8">
                                                                <select class="form-control" name="centro">
                                                                    <?php
                                                                    foreach ($comentarioCentro as $coment) {
                                                                        echo "<option value=\"{$coment['idCentro']}\">" . "{$coment['nomeFantasia']}" . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row text-center">
                                                            <div class="col-sm" style="margin-top: 10px;">
                                                                <p class="text-center">
                                                                    <button type="submit" class="btn btn-outline-info">Verificar</button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    $centroautomotivo = isset($_POST["centro"]) ? ($_POST["centro"]) : "";
                                                    require_once '../dao/ComentarioDAO.php';
                                                    $comentarioDAO = new ComentarioDAO();
                                                    $comentarios = $comentarioDAO->selecionarComCentro($centroautomotivo);
                                                    if ($centroautomotivo == "") {
                                                        echo "<p class='text text-center' style='color: #D9534F'>Não existem comentários para este centro automotivo, por favor selecione outro!</p>";
                                                    } else {
                                                        ?>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Nota</th>
                                                                    <th scope="col">Comentario</th>
                                                                    <th scope="col">Usuário</th>
                                                                    <th scope="col">Apagar</th>
                                                                    <th scope="col">Editar</th>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            foreach ($comentarios as $comentario) {
                                                                echo "<tbody>";
                                                                echo "<tr>";
                                                                echo "<td>{$comentario["nota"]}</td>";
                                                                echo "<td>{$comentario["comentario"]}</td>";
                                                                echo "<td>{$comentario["nome"]}</td>";
                                                                echo "<td><a href=\"../controller/ExcluirComentarioController.php?id={$comentario["idComentario"]}&centro={$comentario["cliente_id"]}\" class=\"btn btn-outline-danger\" onclick=\"return confirm('Está certo disto?');\"><i class=\"fas fa-trash\"></i>&nbsp;Excluir</a></td>";
                                                                echo "<td><a href=\"editarComentario.php?id={$comentario["idComentario"]}&idc={$comentario["centroAutomotivo"]}&user={$comentario["cliente_id"]}\" class=\"btn btn-outline-warning\"><i class=\"far fa-edit\"></i>&nbsp;Editar</a></td>";
                                                                echo "</tr>";
                                                                echo "</tbody>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="pecas" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <h3 class="text text-center">Peças - Anúncios</h3><p class="text-center text">Utilize esse espaço para gerenciar anúncios de peças</p>
                                                    <form method="" action="">
                                                        <?php
                                                        require_once '../dao/UsuarioDAO.php';
                                                        require_once '../dao/AnuncioDAO.php';
                                                        $UsuarioDAO = new UsuarioDAO();
                                                        $usuarios = $UsuarioDAO->selectAllUsuarios();
                                                        $idUser = isset($_GET["usuario"]) ? ($_GET["usuario"]) : "";
                                                        $anuncioDAO = new AnuncioDAO();
                                                        $anuncios = $anuncioDAO->listarAnuncioId($idUser);
                                                        ?>
                                                        <div class="row">
                                                            <div class="col"><label class="text text-center">Selecione um usuário</label></div>
                                                            <div class="col-8">
                                                                <select name="usuario" class="form-control">
                                                                    <option>-- Selecione um usuário --</option>
                                                                    <?php
                                                                    if (count($usuarios) == 0) {
                                                                        echo "<p class='text text-center' style='color: #D9534F'>" . "Não existem usuários cadastrados" . "</p>";
                                                                    } else {
                                                                        foreach ($usuarios as $usuario) {
                                                                            echo "<option value=\"{$usuario['idUsuario']}\">" . "{$usuario['usuario']}" . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if (count($anuncios) <= 0) {
                                                            echo "<p class='text text-center' style='color: #D9534F'>" . "Não existem anúncios cadastrados para este usuário, por favor escolha outro!" . "</p>";
                                                        } else {
                                                            ?>
                                                            <div class="row text-right"><div class="col-sm"><small class="text text-right">Clique nas imagens para ampliar</small></div></div>
                                                            <table class="table" style="margin-top: 10px">
                                                                <thead>
                                                                    <tr>
                                                                        <td>Título</td>
                                                                        <td>Preço</td>
                                                                        <td>Descrição</td>
                                                                        <td>Data de publicação</td>
                                                                        <td>Foto 1</td>
                                                                        <td>Foto 2</td>
                                                                        <td>Foto 3</td>
                                                                        <td>Excluir</td>
                                                                        <td>Alterar</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($anuncios as $anuncio) {
                                                                        echo "<tbdoy>";
                                                                        echo "<tr>";
                                                                        echo "<td>" . "{$anuncio["titulo"]}" . "</td>";
                                                                        echo "<td> R$" . str_replace(".", ",", $anuncio["preco"]) . /* "{$anuncio["preco"]}". */"</td>";
                                                                        echo "<td>" . "{$anuncio["descricao"]}" . "</td>";
                                                                        echo "<td>" . date('d/m/Y', strtotime($anuncio["dataCadastro"]))/* ."{$anuncio["dataAtual"]}" */ . "</td>";
                                                                        echo "<td>" . "<a href='../images/{$anuncio["fotoUm"]}'><img src='../images/{$anuncio["fotoUm"]}' style='width: 80px; height: 60px'></a>" . "</td>";
                                                                        echo "<td>" . "<a href='../images/{$anuncio["fotoDois"]}'><img src='../images/{$anuncio["fotoDois"]}' style='width: 80px; height: 60px'></a>" . "</td>";
                                                                        echo "<td>" . "<a href='../images/{$anuncio["fotoTres"]}'><img src='../images/{$anuncio["fotoTres"]}' style='width: 80px; height: 60px'></a>" . "</td>";
                                                                        echo "<td class='text-center' style='font-size: 20px'>" . "<a href='../controller/excluirAnuncioController.php?id={$anuncio["idAnuncio"]}' onclick=\"return confirm('Tem certeza disso?');\"><i class=\"fas fa-trash\"></i></a>" . "</td>";
                                                                        echo "<td class='text-center' style='font-size: 20px'>" . "<a href='editarAnuncio.php?idP={$anuncio["idAnuncio"]}'><i class=\"far fa-edit\"></i></a>" . "</td>";
                                                                        echo "</tr>";
                                                                        echo "</tbody>";
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            <?php } ?>
                                                        </table>
                                                        <div class="row" style="margin-top: 10px">
                                                            <div class="col-sm">
                                                                <p class="text text-center"><button type="submit" class="btn btn-outline-info">Verificar</button></p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="veiculo" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <h3 class="text text-center">Gerenciar Veículos</h3>
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Adicionar uma montadora(marca)
                                                                    </button>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <h5 class="text text-center">Adicionar Montadora</h5>
                                                                    <form method="post" action="../controller/addMontadora.php">
                                                                        <div class="container mb-5">
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="text text-center">Montadora</label>
                                                                                    <input type="text" name="montadora" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <input type="submit" name="Cadastrar" class="btn btn-primary" style="margin-top: 10px;"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Adicionar um modelo a uma montadora
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <h5 class="text text-center">Adicionar o modelo</h5>
                                                                    <form method="post" action="../controller/addModelo.php">
                                                                        <div class="container mb-5">
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="text text-center">Montadora</label>
                                                                                    <select name="montadora" class="form-control">
                                                                                        <?php
                                                                                        foreach ($montadoras as $marca) {
                                                                                            echo "<option value=\"{$marca['idMontadora']}\">" . "{$marca['montadora']}" . "</option>\n";
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="text text-center">Modelo</label>
                                                                                    <input type="text" name="modelo" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <input type="submit" value="Cadastrar" class="btn btn-primary" style="margin-top: 10px;"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Adicionar um veículo a um modelo
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="container mb-5">
                                                                        <h5 class="text text-center">Adicionar Veículo</h5>
                                                                        <form method="POST" action="../controller/addCarro.php" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-sm"><label>Montadora</label>
                                                                                    <select name="montadora" class="form-control" id="montadora" onmouseover="buscar_modelo()" onchange="buscar_modelo()">
                                                                                        <?php
                                                                                        foreach ($montadoras as $marca) {
                                                                                            echo "<option value=\"{$marca['idMontadora']}\">" . "{$marca['montadora']}" . "</option>\n";
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                
                                                                                <div class="col-sm"><label>Modelo</label>
                                                                                    <div id="load_modelo">
                                                                                    <select name="modelo" class="form-control" id="modelo">
                                                                                        <option>-- Selecione um --</option>
                                                                                    </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="text text-center">Carro</label>
                                                                                    <input type="text" name="nome" class="form-control" required>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label class="text text-center">Ano</label>
                                                                                    <select name="ano" class="form-control">
                                                                                        <?php
                                                                                        for ($ano = 1960; $ano <= date("Y") + 1; $ano++) {
                                                                                            echo "<option value=\"{$ano}\">" . $ano . "</option>\n";
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="text text-center">Motor</label>
                                                                                    <input type="text" class="form-control" name="motor">
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label class="text text-center">Combustível</label>
                                                                                    <select name="combustivel" class="form-control">
                                                                                        <option value="Gasolina">Gasolina</option>
                                                                                        <option value="Álcool">Álcool</option>
                                                                                        <option value="Flex">Flex</option>
                                                                                        <option value="Diesel">Diesel</option>
                                                                                        <option value="GNV">GNV</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="saeR">Viscosidade SAE <u>Recomendada</u></label>
                                                                                    <input type="text" class="form-control" name="saeR" required>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label class="saeA">Viscosidades SAE <u>Alternativas</u></label>
                                                                                    <input type="text" name="saeA" class="form-control" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="text">Especificação Europeia ACEA</label>
                                                                                    <input type="text" class="form-control" name="acea" required/>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label class="text">Especificação Americana API</label>
                                                                                    <input type="text" class="form-control" name="api" required>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label class="text">Tipo de óleo</label>
                                                                                    <select name="tipoOleo" class="form-control">
                                                                                        <option value="Sintético">Sintético</option>
                                                                                        <option value="Sintético">Semi-Sintético</option>
                                                                                        <option value="Sintético">Mineral</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label class="text">Capacidade em l</label>
                                                                                    <input type="text" class="form-control" name="cap" required>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label class="text">Foto</label>
                                                                                    <input type="file" name="foto" class="form-control-file"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <input type="submit" name="enviar" value="Cadastrar" class="btn btn-primary" style="margin-top: 10px; text-align: center"/>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <h3 class="text text-center">Opções - Veículos</h3>
                                                    <p class="text-center">
                                                    <a href="gMont.php" class="btn btn-warning">Montadora</a>
                                                    <a href="gMod.php" class="btn btn-warning">Modelos</a>
                                                    <a href="gCar.php" class="btn btn-warning">Carros</a>
                                                    </p><hr>
                                                    <h3 class="text text-center">Opções - Veículo -> Filtro</h3>
                                                    <p class="text-center">
                                                        <a href="vOV.php" class="btn btn-warning">Vincular óleo a veículo</a>
                                                        <a href="vFV.php" class="btn btn-warning">Vincular filtro a veículo</a>
                                                    </p>
                                                </div>
                                                <div class="tab-pane fade" id="oleo" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <h3 class="text text-center">Óleos</h3><p class="text text-center">Adicione - Edite - Apague - Pesquise</p>
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#colOleo" aria-expanded="false" aria-controls="collapseOne">
                                                                        Adicionar Óleo
                                                                    </button>
                                                                </h5>
                                                            </div>
                                                            <div id="colOleo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <form method="post" action="../controller/cadastrarOleoController.php" enctype="multipart/form-data">
                                                                        <div class="row">
                                                                            <div class="col-sm"><label class="text">Nome do óleo</label><input type="text" name="nomeoleo" class="form-control" required></div>
                                                                            <div class="col-sm"><label class="text">Marca</label><input type="text" name="marca" class="form-control" required></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm"><label class="text">API</label><input type="text" name="api" class="form-control"></div>
                                                                            <div class="col-sm"><label class="text">Viscosidade SAE</label><input type="text" name="sae" class="form-control"></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm"><label class="text">ACEA</label><input type="text" name="acea" class="form-control"></div>
                                                                            <div class="col-sm"><label class="text">Tipo</label><select name="tipo" class="form-control"><option value="Mineral">Mineral</option><option value="Sintético">Sintético</option><option value="Semi-Sintético">Semi-Sintético</option></select></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm"><label class="text">Foto</label><input type="file" name="foto" class="form-control-file"/></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm"><p class="text text-center"><button type="Submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp;Enviar</button></p></div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <?php
                                                    require_once '../dao/OleoDAO.php';
                                                    $OleoDAO = new OleoDAO();
                                                    ?>
                                                    <h5 class="text text-center">Pesquisar e Editar Óleo</h5>
                                                    <p class="text text-center">
                                                        <a class="btn btn-info" data-toggle="collapse" href="#oil" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            Clique Aqui
                                                        </a>
                                                    </p>
                                                    <div class="collapse" id="oil">
                                                        <div class="card card-body">
                                                            <form action="painelAdministrador.php" method="post">
                                                                <div class="row">
                                                                    <div class="col-sm"><label>Pesquisar</label><input type="text" name="busca" class="form-control" placeholder="pesquise o oleo"/><input type="submit" class="btn btn-outline-primary" value="Pesquisar"></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $oleos = array();
                                                    $res = isset($_POST["busca"]) ? ($_POST["busca"]) : null;
                                                    if ($res == null) {
                                                        $oleos = $OleoDAO->listarAllOleos();
                                                        echo " pesquisa por campo em branco";
                                                    } else {
                                                        $oleos = $OleoDAO->pesquisarOleos($res);
                                                        echo "Pesquisando por: {$res}";
                                                    }
                                                    ?>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Nome</th>
                                                                <th>Marca</th>
                                                                <th>API</th>
                                                                <th>SAE</th>
                                                                <th>ACEA</th>
                                                                <th>Tipo</th>
                                                                <th>Foto</th>
                                                                <th>Excluir</th>
                                                                <th>Editar</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        foreach ($oleos as $oleo) {
                                                            echo "<tbody>";
                                                            echo "<tr>";
                                                            echo "<td>{$oleo["nomeOleo"]}</td>";
                                                            echo "<td>{$oleo["marcaOleo"]}</td>";
                                                            echo "<td>{$oleo["apiOleo"]}</td>";
                                                            echo "<td>{$oleo["sae"]}</td>";
                                                            echo "<td>{$oleo["acea"]}</td>";
                                                            echo "<td>{$oleo["tipoOleo"]}</td>";
                                                            echo "<td><img src='../images/{$oleo["foto"]}' style='width: 60px; height: 60px;'></td>";
                                                            echo "<td><a href='editarOleo.php?id={$oleo["idOleo"]}' class='btn btn-outline-warning'>Editar</a></td>";
                                                            echo "<td><a href='../controller/excluirOleoController.php?id={$oleo["idOleo"]}' class='btn btn-outline-danger' onclick=\"return confirm('Tem certeza que deseja excluir este registro?');\">Excluir</a></td>";
                                                            echo "</tr>";
                                                            echo "</tbody>";
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="filtro" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <h3 class="text text-center">Filtros</h3><p class="text text-center">Adicione - Edite - Apague - Pesquise</p>
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Adicionar Filtro
                                                                    </button>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <form method="post" action="../controller/cadastrarFiltroController.php" enctype="multipart/form-data">
                                                                        <div class="row">
                                                                            <div class="col-sm"><label class="text">Marca do filtro</label><input type="text" name="marca" class="form-control" required></div>
                                                                            <div class="col-sm"><label class="text">Tipo do filtro</label><input type="text" name="tipo" class="form-control" required></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm"><label class="text">Código do Fab.</label><input type="text" name="cod" class="form-control"></div>
                                                                            <div class="col-sm"><label class="text">Motores compatíveis</label><input type="text" name="motores" class="form-control"></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm"><label class="text">Foto</label><input type="file" name="foto" class="form-control-file"/></div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm"><p class="text text-center"><button type="Submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp;Enviar</button></p></div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <?php
                                                    require_once '../dao/FiltroDAO.php';
                                                    $filtroDAO = new FiltroDAO();
                                                    ?>
                                                    <h5 class="text text-center">Pesquisar e Editar Filtro</h5>
                                                    <p class="text text-center">
                                                        <a class="btn btn-info" data-toggle="collapse" href="#fils" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            Clique Aqui
                                                        </a>
                                                    </p>
                                                    <div class="collapse" id="fils">
                                                        <div class="card card-body">
                                                            <form action="painelAdministrador.php" method="post">
                                                                <div class="row">
                                                                    <div class="col-sm"><label>Pesquisar</label><input type="text" name="termo" class="form-control" placeholder="digite a marca, motor ou código do filtro"/><input type="submit" class="btn btn-outline-primary" value="Pesquisar"></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $filtros = array();
                                                    $termo = isset($_POST["termo"]) ? ($_POST["termo"]) : null;
                                                    if ($termo == null) {
                                                        $filtros = $filtroDAO->listarAllFiltros();
                                                        echo " pesquisa por campo em branco";
                                                    } else {
                                                        $filtros = $filtroDAO->pesquisarFiltros($termo);
                                                        echo "Pesquisando por: {$termo}";
                                                    }
                                                    ?>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Marca</th>
                                                                <th>Tipo</th>
                                                                <th>Código</th>
                                                                <th>Motores</th>
                                                                <th>Foto</th>
                                                                <th>Editar</th>
                                                                <th>Excluir</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        foreach ($filtros as $filtro) {
                                                            echo "<tbody>";
                                                            echo "<tr>";
                                                            echo "<td>{$filtro["marcaFiltro"]}</td>";
                                                            echo "<td>{$filtro["tipoFiltro"]}</td>";
                                                            echo "<td>{$filtro["cod"]}</td>";
                                                            echo "<td>{$filtro["motorFiltro"]}</td>";
                                                            echo "<td><img src='../images/{$filtro["foto"]}' style='width: 60px; height: 60px;'></td>";
                                                            echo "<td><a href='editarFiltro.php?id={$filtro["idFiltro"]}' class='btn btn-outline-warning'>Editar</a></td>";
                                                            echo "<td><a href='../controller/excluirFiltroController.php?id={$filtro["idFiltro"]}' class='btn btn-outline-danger' onclick=\"return confirm('Tem certeza que deseja excluir este registro?');\">Excluir</a></td>";
                                                            echo "</tr>";
                                                            echo "</tbody>";
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="editar" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <p class="text text-center">Clique no botão abaixo, para alterar os seus dados</p>
                                                    <p class="text-center"><a class="btn btn-info" href="../view/formAlterarAdmin.php?id=<?php echo $_SESSION['idUsuario']; ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Alterar</a></p>                                       
                                                </div>
                                                <div class="tab-pane fade" id="apagar" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    <p class="text text-center">Clique no botão abaixo, para APAGAR SUA CONTA</p>
                                                    <p class="text-center">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                            <i class="fas fa-user-times"></i>&nbsp;Apagar Minha Conta
                                                        </button>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Apagar Conta</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Deseja realmente apagar sua conta no Ultimate Car?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <a class="btn btn-danger" href="../controller/excluirAdmController.php?id=<?php echo $_SESSION["idUsuario"] ?>" role="button">Apagar Conta</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-info" href="../controller/logoffController.php" role="button"><i class="fas fa-door-open"></i>&nbsp;Sair</a>    
                    </div>
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
    <script>
        function buscar_modelo(){
            var montadora = $('#montadora').val();
            if(montadora){
                var url = "../controller/ajax_buscar_modelo.php?montadora=" + montadora;
                $.get(url, function (dataReturn){
                    $('#load_modelo').html(dataReturn);
                });
            }
        }
    </script>   
    <br><script src="../js/jsProfile.js" type="text/javascript"></script>
    <?php
    require_once '../includes/footer.php';
    ?>