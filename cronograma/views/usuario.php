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

        <title>Projeto</title>
    </head>
    <body>


        <div class="div_form">
            <table class="table th td" >
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($atividadesPadroes as $atividadePadrao) {
                        echo "<tr>";
                        echo "<td>" . $usuario['id_usuario'] . "</td>";
                        echo "<td>" . $usuario['nome_usuario'] . "</td>";
                        echo "<td>" . $usuario['login_usuario'] . "</td>";
                        echo "<td>" . $usuario['email_usuario'] . "</td>";
                        echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/usuarios/formAlterar/" . $usuario['id_usuario'] . ">Alterar</td>";
                        echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/usuarios/excluir/" . $usuario['id_usuario'] . ">Excluir</td>";
                        echo "</tr> ";
                    }
                    ?>
                </tbody>
            </table>
            <br />
            <table>
                <tr>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>/usuarios/form_add">Adicionar</a></td>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
                </tr></table>
        </div>



    </body>
</html>
