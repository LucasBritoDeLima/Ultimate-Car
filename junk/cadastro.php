<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="../controller/cadastrarUsuarioController.php">
            <p>Nome:</p><input type="text" name="nome" placeholder="nome" required><br/>
            <p>Senha:</p><input type="password" name="senha" placeholder="nome" required><br/>
            <p>Email:</p><input type="email" name="email" placeholder="nome" required><br/>
            <input type="submit">
        </form>
    </body>
</html>
