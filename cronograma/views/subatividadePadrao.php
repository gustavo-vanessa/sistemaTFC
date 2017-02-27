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

        <title>Atividades</title>
    </head>
    <body>


        <div class="div_form">
            <table class="table th td" >
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Atividade Principal</th>
                        <th>Obrigatório</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($subatividadesPadroes as $subatividadePadrao) {
                        echo "<tr>";
                        echo "<td>" . $subatividadePadrao['id_sub_atividades_padroes'] . "</td>";
                        echo "<td>" . $subatividadePadrao['nome_sub_atividade_padroes'] . "</td>";
                        echo "<td>" . $subatividadePadrao['descricao_sub_atividades_padroes'] . "</td>";
                        echo "<td>" . $subatividadePadrao['id_atividade_padroes'] . "</td>";
                        echo "<td>" . $subatividadePadrao['ie_obrigatorio_sub_atividades_padroes'] . "</td>";
                        echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/subatividadePadrao/formAlterar/" .  $subatividadePadrao['id_sub_atividades_padroes'] . ">Alterar</td>";
                        echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/subatividadePadrao/excluir/" .  $subatividadePadrao['id_sub_atividades_padroes'] . ">Excluir</td>";
                        echo "</tr> ";
                    }
                    ?>
                </tbody>
            </table>
            <br />
            <table>
                <tr>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>/subatividadePadrao/form_add">Adicionar</a></td>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
                </tr></table>
        </div>
    </body>
</html>
