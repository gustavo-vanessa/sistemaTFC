<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style\style_template.css" rel="stylesheet" />
        
        <title>Projeto</title>
    </head>
    <body>
       
        <form method="post" action="<?php echo BASE_URL; ?>/pmbok/add">
        <div class="div_form">
            <label class="control-label">Descrição do PMBOK:</label><br />
            <input class="form-control" name="descricao_pmbok" required placeholder="Descrição do PMBOK" type="text"><br />
            <br />
            <table><tr>
                    <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/pmbok">Voltar</a></td>
            </tr></table>
        </div>
        </form> 
        
    </body>
</html>
