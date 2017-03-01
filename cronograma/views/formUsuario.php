<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="<?php echo BASE_URL; ?>assets/css/style_usuario.css" rel="stylesheet" />
        
        <title>Projeto</title>
    </head>
    <body >
        <form method="post" action="<?php echo BASE_URL; ?>/usuarios/add">
            <div class="div_form">
                    <label class="label">Nome:</label><br />
                    <input class="form-control" name="nome_usuario" placeholder="Nome" type="text"><br />                
                    
                    <label class="label">Login:</label><br />
                    <input class="form-control" name="login_usuario" placeholder="Enter Login" type="text"><br />
                    
                    <label class="label" for="exampleInputPassword1">Senha:</label><br />
                    <input class="form-control" name="Password_usuario" placeholder="Senha" type="password"><br />
                    
                    <label class="label" for="exampleInputEmail1">E-mail:</label><br />
                    <input class="form-control" name="Email_usuario" placeholder="Enter e-mail" type="email"><br />
                    
                    <table><tr>
                            <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/usuarios">Voltar</a></td>
                    </tr></table>
                </div>    
        </form>
    </body>
</html>