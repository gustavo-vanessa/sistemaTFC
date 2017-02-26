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
        
        
        <div class="div_form scroll">
        <table class="table th td" >
                <thead>
                  <tr>
                    <th>Cód</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Data Validação</th>
                    <th>Orientador</th>
                    <th>Orientando</th>
                    <th>PMBOK Versão</th>
                    <th>Ações</th>
                    <th></th>
                  </tr>
                </thead>
            <tbody>
                <?php foreach ($projetos as $projeto){
                     echo "<tr>";
                         echo "<td>".$projeto['id_projeto']."</td>";
                         echo "<td>".$projeto['nome_projeto']."</td>";
                         echo "<td>".$projeto['status_projeto']."</td>";
                         echo "<td>".$projeto['data_validacao']."</td>";
                         echo "<td>".$projeto['nome_orientador']."</td>";
                         echo "<td>".$projeto['nome_orientando']."</td>";
                         echo "<td>".$projeto['desc_pmbok']."</td>";
                         echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = ".BASE_URL."projeto/formAlterar/".$projeto['id_projeto'].">Alterar</td>";
                         echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = ".BASE_URL."projeto/excluir/".$projeto['id_projeto'].">Excluir</td>";
                    echo "</tr> ";
                }?>
            </tbody>
    </table>
                <br />
                <table><tr>
                        <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>/projeto/form_add">Adicionar</a></td>
                        <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
                </tr></table>
        </div>
        
        
        
    </body>
</html>
