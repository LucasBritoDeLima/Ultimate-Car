<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" type="image/png" href="../imagens/etcfavicon.png" /><!--Usando faviconIcon na Aba do URL-->
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <title>Home</title>
    </head>
    <body>
        <?php
        session_start();
        ?> 
        <table width="100%">
            <tr>
                <td width="85%">
                    <?php
                    switch ($_SESSION["perfil"]) {
                        case "Administrador":
                            echo "<h1>Administrador</h1>";
                            break;
                        case "Usuario":
                            echo "<h1>usuario</h1>";
                            break;
                        case "Cliente":
                            echo "<h1>centro automotivo</h1>";
                            break;
                    }
                    ?>
                    <br>
                </td>
                <td align="right" width="15%">
                    <?php
                    if (isset($_SESSION["email"])) {
                        echo "Usuário logado: ", $_SESSION["email"];
                        echo "<br>";
                        echo "Perfil: ", $_SESSION["perfil"];
                    }
                    ?>
                    <br>
                    <a href="controller/logoffController.php">sair</a>
                </td>
            </tr>
        </table>
        <table id="tablehome">
            <tr>         
                <td>
                    <iframe name="centro" src="" width="100%" height="100%" frameborder="0"></iframe>
                </td>
            </tr>                
        </table>
    </body>
</html>
