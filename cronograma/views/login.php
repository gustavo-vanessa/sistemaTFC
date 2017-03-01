<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo BASE_URL;?>assets\css\style_login.css" rel="stylesheet" />
    </head>
    <body>

        <form method="post" action="<?php echo BASE_URL; ?>validaLogin">
            <div class="div_form ">
                                <label class="label" for=Login">Login</label><br>
                                <input class="form-control" name="Login" required placeholder="Entre com o login" type="text"><br>
                                <label class="label" for="exampleInputPassword1">Senha</label><br>
                                <input class="form-control" name="exampleInputPassword1" required placeholder="Senha" type="password"><br>
                            
                            <input type="submit" name="submit" value="Login" class="btn btn-padrao btn-shadow btn-rc"/><br><br>
                            </div>
                           
                        
                    
</form>
    </body>
</html>