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
                        <th>PMBOK</th>
                        <th>Obrigatório</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($atividadesPadroes as $atividadePadrao) {
                        echo "<tr>";
                        echo "<td>" . $atividadePadrao['id_atividades_padroes'] . "</td>";
                        echo "<td>" . $atividadePadrao['nome_atividades_padroes'] . "</td>";
                        echo "<td>" . $atividadePadrao['descricao_atividades_padroes'] . "</td>";
                        echo "<td>" . $atividadePadrao['desc_pmbok'] . "</td>";
                        echo "<td>" . $atividadePadrao['ie_obrigatorio_atividades_padroes'] . "</td>";
                        echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/atividadePadrao/formAlterar/" .  $atividadePadrao['id_atividades_padroes'] . ">Alterar</td>";
                        echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/atividadePadrao/excluir/" .  $atividadePadrao['id_atividades_padroes'] . ">Excluir</td>";
                        echo "</tr> ";
                    }
                    ?>
                </tbody>
            </table>
            <br />
            <table>
                <tr>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>/atividadePadrao/form_add">Adicionar</a></td>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
                </tr></table>
        </div>



    </body>
</html>
