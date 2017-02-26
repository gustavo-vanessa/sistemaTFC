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
         <?php foreach ($usuarios as $usuario){
             
         
        echo'<form method="post" action="'.BASE_URL.'/usuarios/alterar/'.$usuario['id_usuario'].'">';
            echo'<div class="div_form">';
                    echo'<label class="label">Nome:</label><br />';
                    echo'<input class="form-control" name="nome_usuario" placeholder="Nome" type="text" value="'.$usuario['nome_usuario'].'"><br />';                
                    
                    echo'<label class="label">Login:</label><br />';
                    echo'<input class="form-control" name="login_usuario" placeholder="Enter Login" type="text" value="'.$usuario['login_usuario'].'"><br />';
                    
                    echo'<label class="label" for="exampleInputPassword1">Senha:</label><br />';
                    echo'<input class="form-control" name="Password_usuario" placeholder="Senha" type="password" value="'.$usuario['senha_usuario'].'"><br />';
                    
                    echo'<label class="label" for="exampleInputEmail1">E-mail:</label><br />';
                    echo'<input class="form-control" name="Email_usuario" placeholder="Enter e-mail" type="email" value="'.$usuario['email_usuario'].'"><br />';
                    echo '<table><tr>';
                    echo'<td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td><br><br>';
                    echo'<td><a class="btn btn-padrao btn-shadow btn-rc" href="'.BASE_URL.'/usuarios">Voltar</a></td><br />';
                    echo '</tr></table>';
                    echo'<br />';
                echo'</div>';    
        echo'</form>';
}?>
    </body>
</html>