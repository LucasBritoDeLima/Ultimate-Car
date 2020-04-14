<?php
require_once '../dao/conexao/Conexao.php';
$conexao = Conexao::getInstance(); //Fazendo a conexão com o banco de dados
?>
<?php
//numero maximo de registros que serão mostrados na tela
$maximo = 2;
//armazenamos o valor da pagina atual
$pagina = isset($_GET['pagina'])? ($_GET['pagina']) : '1';
//subtraimos 1, porque os registros sempre começam do zero como em um array
$inicio = $pagina - 1;
//mutiplicamos a quantidade de registros da pagina pelo valor da pagina atual
$inicio = $maximo * $inicio;
?>
<?php 
$sql = "SELECT * FROM nomes";
$stm = $conexao->prepare($sql);
$stm->execute();
$namead = $stm->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
if(count($namead)){
    foreach($namead as $row){
        //armazenar o total de registros da tabela para fazer a paginação
        $total = count($namead);
    }
}
?>
<?php 
$sql = "SELECT * FROM nomes ORDER BY id LIMIT $inicio,$maximo";
$stm = $conexao->prepare($sql);
$stm->execute();
$realnames = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" />
        <title>Pagina&ccedil;&atilde;o com PHP</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
    </head>
    <body>
        <table class="tabela1">
            <colgroup>
                <col class="coluna1"/>
                <col class="coluna2"/>
                <col class="coluna3"/>
            </colgroup>
            <caption>Pagina&ccedil;&atilde;o com PHP</caption>          
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Municipio</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //se a tabela nao estiver vazia, percorremos linha por linha pegando os valores
                if(count($realnames)){
                    foreach ($realnames as $names) {
                        echo "<tr>";
                        echo "  <td>".$names['id']."</td>";
                        echo "  <td>".$names['nome']."</td>";
                        echo "</tr>";
   
                    }
                }
            ?>
            </tbody>          
        </table>
<div id="alignpaginacao">
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
                    echo "<div id='botaoanterior'><a href=".$_SERVER['PHP_SELF']."?pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='button' /></a></div>";
                } else{
                    echo "<div id='botaoanteriorDis'><a href=".$_SERVER['PHP_SELF']."?pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='button' disabled='disabled'/></a></div>";
                }   
                   
                echo "<div id='numpaginacao'>";
                    for($i=$pagina-$max_links; $i <= $pgs-1; $i++) {
                        if ($i <= 0){
                        //enquanto for negativo, não faz nada
                        }else{
                            //senão adiciona os links para outra pagina
                            if($i != $pagina){
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo "<a href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a> ..."; 
                                }else{
                                    echo "<a href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a>"; 
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
                       
                echo "</div>";
                   
                //botao proximo
                if($next <= $pgs){
                    echo " <div id='botaoprox'><a href=".$_SERVER['PHP_SELF']."?pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='button'/></a></div>";
                }else{
                    echo " <div id='botaoproxDis'><a href=".$_SERVER['PHP_SELF']."?pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='button' disabled='disabled'/></a></div>";
                }
                               
            }
                           
       ?>   
</div>
    </body>
</html>