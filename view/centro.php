<?php
    session_start();
    $idUsuario = isset($_SESSION["id"]) ? $_SESSION["id"] : '';
    $idCliente = isset($_SESSION["idCliente"]) ? ($_SESSION["idCliente"]) : '';
    $perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : '';
    require_once '../includes/header.php';
    require_once '../dao/CentroAutomotivoDAO.php';
    require_once '../dao/ComentarioDAO.php';
    $centroAutomotivoDAO = new CentroAutomotivoDAO();
    $idCentroAutomotivo = $_GET["id"];
    $centro = $centroAutomotivoDAO->listarCentroById($idCentroAutomotivo);
    $comentarioDAO = new ComentarioDAO();
    $comentarios = $comentarioDAO->listarComentariosCentro($idCentroAutomotivo);
    $notas = $comentarioDAO->mediaCentro($idCentroAutomotivo);
    require_once './paginacaoComent.php';
   
?>
    <div class="container mb-5">
        <h1 class="text text-center">Página do Centro Automotivo:<br> <?php echo $centro["nomeFantasia"]?></h1>
        <h4 class="text-center text">Dados do centro automotivo</h4><hr><br>
        <div class="container mb-5">
            <div class="row">
                <div class="col-sm" style="margin-left: -15px; margin-right: -15px;">
                    <img src="../controller<?php echo $centro["foto"]?>" class="img-fluid rounded" width="600px" align="center">
                </div>
                <div class="col-sm">
                    <div class="d-flex flex-column bd-highlight mb-3 " style="font-size: 18px;">
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px; margin-top: 10px"><b>Nome fantasia: </b><?php echo $centro["nomeFantasia"]?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px;"><b>Razão Social: </b><?php echo $centro["razaoSocial"] ?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px;"><b>CNPJ: </b><?php echo $centro["cnpj"]?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px;"><b>Telefone: </b><?php echo $centro["telefone"]?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px;"><b>Endereço: </b><?php echo $centro["logradouro"]. " " . $centro["numero"] . " " .$centro["bairro"]. " - ".$centro["cep"];?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px;"><b>E-mail: </b><?php echo $centro["email"]?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px;"><b>Cidade/Estado: </b><?php echo $centro["cidade"]."/".$centro["estado"]?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 10px;"><b>Serviços Realizados: </b><?php echo $centro["servico"]?></div>
                        <div class="p-2 bd-highlight text rounded border border-secondary d-flex justify-content-between" style="margin-bottom: 0px;"><b>Média: </b><p class="text-right" style="margin-bottom: -10px;">
                            <?php  if($notas["AVG(nota)"] == 0){ 
                                echo "Ainda não avaliado"; }else{
                                    echo number_format($notas["AVG(nota)"],1,'.',',');
                                }
                                ?>
                                <i class="text-warning fa fa-star"></i></p></div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="text text-center">Avaliações</h4><p class="text text-center">Registre avaliações sobre os centros automotivos</p>
        <h5 class="text text-right">Comentários(<?php echo count($comentarios);?>)</h5><hr style="margin-top: -6px">
        <div class="container mb-5">
            <form method="post" action="../controller/salvarComentarioController.php">
                <input type="hidden" name="centroautomotivo" value="<?php echo $idCentroAutomotivo ?>" />
                <input type="hidden" name="usuario" value="<?php echo $idUsuario ?>" />
                <input type="hidden" name="cliente" value="<?php echo $idCliente?>"/>
            <div class="row">
                    <label>Conte-nos sua história com essa empresa</label>
                    <textarea id="comentario" name="comentario" rows="6" cols="40" class="form-control" maxlength="300" required ></textarea>
            </div>
            <div class="row">
                    <label class="text" class="form-control">Nota</label>
                    <select name="nota" class="form-control">
                        <option>Selecione uma opção</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </div>
                <div class="row" style="margin-top: 10px;">
                    <?php if($perfil == "Cliente"){?>
                    <p class="text text-center"><button type="submit" class="btn btn-outline-primary">Comentar&nbsp;<i class="fas fa-comment"></i></button></p>
                    <?php } else {?>
                    <p class="text text-center">Os comentários estão inativos para outros usuários, ou faça login</p>
                    <?php }?>
            </div>
            </form>
            </div>
        </div>
<div>
<div class="container mb-5">
	<h2 class="text-center text">Comentários(<?php echo count($comentarios);?>)</h2>
	<?php if(count($comentarios)){?>
            <?php foreach ($comentarios as $comentario) {?>
	<div class="card">
	    <div class="card-body">
	        <div class="row">
                    
        	    <div class="col-md-2">
                        <img class="rounded-circle img-fluid" src="../controller<?php echo $comentario["foto"] ?>" style="width: 150px; height: 150px; object-fit: cover"/>
                        <p class="text-center">
                            <?php if($idCliente == $comentario["cliente_id"]) {?>
                            <a href="../controller/ExcluirComentarioController.php?id=<?php echo $comentario["idComentario"]?>&centro=<?php echo $comentario["cliente_id"]?>" class="text">Excluir Comentário</a></p>
                                  <?php }  ?>
                    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href=""><strong><?php echo $comentario["nome"]?></strong></a>
                            <span class="float-right"><?php $comentario["nota"]; $i = 1; while($i <= $comentario["nota"]) { $i++;?><i class="text-warning fa fa-star"></i><?php }?></span>

        	       </p>
        	       <div class="clearfix"></div>
        	        <p><?php echo $comentario["comentario"]?></p>
        	    </div>
                    
	        </div>
	    </div>
        </div><br>
        <?php } ?>
        <?php } ?>
</div>
</div>
<div id="" style="margin-left: -20%;">
    <div class="" style="display: flex;
 justify-content: space-around;">
       <?php
            //determina de quantos em quantos links serão adicionados e removidos
            $max_links = 6;
            //dados para os botões
            $previous = $pagina - 1; 
            $next = $pagina + 1; 
            //usa uma funcção "ceil" para arrendondar o numero pra cima, ex 1,01 será 2
            $pgs = ceil($total / $maximo); 
            //se a tabela não for vazia, adiciona os botões
            if($pgs > 1 ){   
                echo "<br/>";
                //botao anterior
                if($previous > 0){
                    echo "<div id='botaoanterior'><a href=".$_SERVER['PHP_SELF']."?id={$idCentroAutomotivo}&pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='btn btn-outline-primary' /></a></div>";
                } else{
                    echo "<div id='botaoanteriorDis'><a href=".$_SERVER['PHP_SELF']."?id={$idCentroAutomotivo}&pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='btn btn-outline-primary' disabled='disabled'/></a></div>";
                }   
                    for($i=$pagina-$max_links; $i <= $pgs-1; $i++) {
                        if ($i <= 0){
                        //enquanto for negativo, não faz nada
                        }else{
                            //senão adiciona os links para outra pagina
                            if($i != $pagina){
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo "<a href=".$_SERVER['PHP_SELF']."?id={$idCentroAutomotivo}&pagina=".($i).">$i</a> ..."; 
                                }else{
                                    echo "<a href=".$_SERVER['PHP_SELF']."?id={$idCentroAutomotivo}&pagina=".($i).">$i</a>"; 
                                }
                            } else{
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo "<span class='current'> ".$i."</span> ..."; 
                                }else{
                                    echo "<span class='current'> ".$i."</span>";
                                }
                            } 
                        }
                    }                 
                //botao proximo
                if($next <= $pgs){
                    echo " <div id='botaoprox'><a href=".$_SERVER['PHP_SELF']."?id={$idCentroAutomotivo}&pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='btn btn-outline-primary'/></a></div>";
                
                    
                    }else{
                    echo " <div id='botaoproxDis'><a href=".$_SERVER['PHP_SELF']."?id={$idCentroAutomotivo}&pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='btn btn-outline-primary' disabled='disabled'/></a></div>";
                    }             
            }
       ?>
    </div>        
</div><br>
<?php
    require_once '../includes/footer.php';