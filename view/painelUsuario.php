<?php
session_start();
require_once '../controller/validaLogin.php';
require_once '../dao/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$idUsuario = isset($_SESSION["idUsuario"])? ($_SESSION["idUsuario"]) : "";
$idCliente = isset($_SESSION["idCliente"])? ($_SESSION["idCliente"]) : "";
$clientes = $usuarioDAO->listarUsuarioById($idUsuario);
?>
<?php
    require_once '../includes/header.php';
?>
<?php
require_once '../dao/conexao/Conexao.php';
?>
<div class="container mb-5">
<div class="row">
<div class="col-12">
    <div class="card">

        <div class="card-body">
            <div class="card-title mb-4">
                <div class="d-flex justify-content-start">
                    <div class="image-container">
                        <?php if(empty($clientes["foto"])){ ?>
                        <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                        <?php }else{ ?>
                        <img src="../controller<?php echo$clientes['foto'];?>" id="imgProfile" style="width: 150px; height: 150px; object-fit: cover" class="img-thumbnail" />
                        <?php }?>
                    </div>
                    <div class="userData ml-3">
                        <h2 class="d-block text" style="font-size: 1.5rem; font-weight: bold"><?php echo $clientes["nome"]?></h2>
                        <h6 class="d-block text"><a href="mailto:<?php echo $clientes["usuario"]?>"><?php echo $clientes["usuario"]?></a></h6>
                        <h6 class="d-block text">Tipo de autenticação: <?php echo $_SESSION["perfil"];?></h6>
                    </div>
                    <div class="ml-auto">
                        <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(isset($_GET["termo"])){ ?>
                <div class="col-12">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Informações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#editar" role="tab" aria-controls="connectedServices" aria-selected="false">Editar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#pecas" role="tab" aria-controls="connectedServices" aria-selected="false">Peças</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#apagar" role="tab" aria-controls="connectedServices" aria-selected="false">Apagar Conta</a>
                        </li>
                    </ul>
                    <?php }else { ?>
                    <div class="col-12">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Informações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#editar" role="tab" aria-controls="connectedServices" aria-selected="false">Editar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#pecas" role="tab" aria-controls="connectedServices" aria-selected="false">Peças</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#apagar" role="tab" aria-controls="connectedServices" aria-selected="false">Apagar Conta</a>
                        </li>
                    </ul>
                    <?php }?>
                    <?php  if(isset($_GET["termo"])){?>    
                    <div class="tab-content ml-1" id="myTabContent">
                        <div class="tab-pane" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                    <?php }else { ?>
                    <div class="tab-content ml-1" id="myTabContent">
                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">                     
                    <?php } ?>
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Nome Completo</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <?php echo $clientes["nome"]?>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">E-mail</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <?php echo $clientes["usuario"]?>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Endereço</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <?php echo $clientes["logradouro"]; echo " ".$clientes["numero"]; echo " - ".$clientes["bairro"]?>

                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">CEP</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <?php echo $clientes["cep"];?>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Cidade/Estado</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <?php echo $clientes["cidade"]."/";echo $clientes["estado"];?>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Tipo de conta</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <?php echo $_SESSION["perfil"];?>
                                </div>
                            </div>
                            <hr />

                        </div>
                        <?php if(isset($_GET["termo"])){ ?>
                        <div class="tab-pane fade show active" id="search" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                        <?php }else {?>
                        <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="ConnectedServices-tab">    
                            <?php }?>
                            <h3 class="text text-center">Pesquisar Usuário</h3>
                            <hr>
                            <h5 class="text text-center">Pesquise por um ou mais usuários</h5><br><br>
                            <p class="textgoogle text-center" style="font-size: 48px; font-weight: 600"><span style="color: #2379cf;">U</span><span style="color: #d93030">s</span><span style="color: #ffd930">u</span><span style="color: #2379cf">a</span><span style="color: #2f9e33">r</span><span style="color: #d93030">i</span><span style="color: #ffd930">o</span></p>
                                <div class="form-group">
                                    <form method="GET" action=""/> 
                                    <div class="d-flex justify-content-center"><input type="text" name="termo" id="pesquisa" placeholder="Digite algo!" class="form-control" style="width: 40%;"/></div>
                                    <p class="text-center"><button type="submit" class="btn btn-outline-primary" style="margin-top: 5px;"><i class="fas fa-search"></i>Buscar</button></p>
                                    </form>
                                    <?php if(!empty($users)):?>
                                                <?php foreach($users as $user):?>
                                                <center>
                                                <div class="card mb-3" style="max-width: 540px;">
                                                   <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="../controller<?=$user->foto?>" class="card-img img-fluid" style="width: 150px; height: 150px; object-fit: cover">
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="card-body">
                                                        <h5 class="card-title text-justify"><?=$user->nome?></h5>
                                                        <p class="card-text text-justify"><?=$user->cidade." - ".$user->estado."<br>".$user->bairro?></p>
                                                      </div>
                                                    </div>
                                                   </div>
                                                </div>
                                                </center>
                                                <?php endforeach;?>
                                        </table>
                                <?php else: ?>
                                        <h3 class="text-center text-primary"></h3>
                                <?php endif; ?>
                                            </div>
                                            <br><br>
                        </div>
                            <div class="tab-pane fade" id="pecas" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                <h3 class="text text-center">Anuncie peças para vender</h3>
                                <hr>
                                <h5 class="text text-center">O que você gostaria de fazer?</h5>
                                <p class="text text-center"><a href="criarAnuncio.php" class="btn btn-info"><i class="fas fa-plus"></i>&nbsp;Criar Anuncio</a></p><hr>
                                <p class="text text-center"><a href="gerenciarAnuncios.php" class="btn btn-secondary"><i class="fas fa-tasks"></i>&nbsp;Gerenciar meus anúncios</a></p>
                            </div>
                        <div class="tab-pane fade" id="editar" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                            <p class="text text-center">Clique no botão abaixo, para alterar os seus dados</p>
                            <p class="text-center"><a class="btn btn-info" href="formAlterarUsuario.php?id=<?php echo $_SESSION['idUsuario'];?>" role="button"><i class="fas fa-edit"></i>&nbsp;Alterar</a></p>
                            <!-- Botão para acionar modal -->
                            <center>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                              <i class="fas fa-user"></i>&nbsp;Alterar a foto
                            </button>
                            </center>
                            <!-- Modal -->
                            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post"  action="../controller/AlterarFotoUserController.php" enctype="multipart/form-data">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alterar foto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" value="<?php echo $clientes['idCliente'];?>" name="id"/>
                                    Foto<input type="file" name="avatar"  class="form-control-file" required="required" value=""/> 
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <input type="submit" class="btn btn-primary" value="Trocar foto" name="submit" />
                                  </div>
                                </form>
                                </div>
                              </div>
                            </div>
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
                                        <a class="btn btn-danger" href="../controller/excluirUsuarioController.php?id=<?php echo $clientes["idUsuario"] ?>&idC=<?php echo $idCliente?>" role="button">Apagar Conta</a>
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
                    </div>
                                </div><br>
        <div class="d-flex justify-content-center">
        <a class="btn btn-info" href="../controller/logoffController.php" role="button"><i class="fas fa-door-open"></i>&nbsp;Sair</a>    
        </div>
        </div>
<br><script src="../js/jsProfile.js" type="text/javascript"></script>
<?php 
    require_once '../includes/footer.php';
?>
