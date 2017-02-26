<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="<?php echo BASE_URL; ?>assets/css/style_atividadespadroes.css" rel="stylesheet" />

        <title>Perfil</title>
    </head>
    <body>


        <div class="div_form">
            <table class="table th td" >
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($perfis as $perfil) {
                        echo "<tr>";
                        echo "<td>" . $perfil['id_perfil'] . "</td>";
                        echo "<td>" . $perfil['nome_perfil'] . "</td>";
                        echo "<td>" . $perfil['descricao_perfil'] . "</td>";
                        echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/perfil/formAlterar/" . $perfil['id_perfil'] . ">Alterar</td>";
                        echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/perfil/excluir/" . $perfil['id_perfil'] . ">Excluir</td>";
                        echo "</tr> ";
                    }
                    ?>
                </tbody>
            </table>
            <br />
            <table><tr>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>/perfil/form_add">Adicionar</a></td>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
                </tr></table>
        </div>



    </body>
</html>
