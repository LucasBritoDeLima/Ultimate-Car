<?php session_start();?>
<div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-start">

                                <div class="userData ml-3">
                                    <h2 class="d-block text text-center" style="font-size: 1.5rem; font-weight: bold"><?php echo $_SESSION["nome"];  ?></h2>
                                    <h6 class="d-block text text-center"><a href="mailto:<?php echo $_SESSION['email']?>"><?php echo $_SESSION["email"]?></a></h6>
                                    <h6 class="d-block text text-center"><?php echo $_SESSION["perfil"]?></h6>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Informações</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#editar" role="tab" aria-controls="connectedServices" aria-selected="false">Editar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#apagar" role="tab" aria-controls="connectedServices" aria-selected="false">Apagar Conta</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nome Completo</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $_SESSION["nome"]?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">E-mail</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $_SESSION["email"]?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Endereço</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $_SESSION["logradouro"]; echo " ".$_SESSION["numero"]; echo " - ".$_SESSION["bairro"]?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">CEP</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $_SESSION["cep"];?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Cidade/Estado</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $_SESSION["cidade"]."/";echo $_SESSION["estado"];?>
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
                                    <div class="tab-pane fade" id="editar" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        <p class="text text-center">Clique no botão abaixo, para alterar os seus dados</p>
                                        <p class="text-center"><a class="btn btn-info" href="../view/formAlterarUsuario.php?id=<?php echo $_SESSION['id'];?>" role="button"><i class="fas fa-edit"></i>&nbsp;Alterar</a></p>
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
                                                    <a class="btn btn-danger" href="../controller/excluirUsuarioController.php?id=<?php echo $_SESSION["id"] ?>" role="button">Apagar Conta</a>
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
<br><script src="../js/jsProfile.js" type="text/javascript"></script>