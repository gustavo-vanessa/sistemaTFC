<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <link href="../../assets/css/style_nomeprojeto.css" rel="stylesheet" />

        <title>Projeto</title>
    </head>
    <body >
        <form method="post" action="<?php echo BASE_URL ?>/subatividade/add">
              <div class="div_form ">
                <div>
                    <label class="control-label">Nome da Subatividade:</label><br />
                    <input class="form-control" name="nome_sub_atividade" placeholder="Nome da Subatividade" type="text"><br />
                    <br />
                </div>  
                <div>
                    <label class="control-label">Status Subatividade:</label><br />
                    <select  class="form-control" name="status_sub_atividade">
                        <option>Selecione</option>    
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>
                    <br />
                    <br />
                </div>
                <div>
                    <label class="control-label">Atividade:</label><br />
                    <select  class="form-control" name="id_atividade">
                        <option>Selecione</option>    
                        <?php
                        foreach ($atividades as $atividade):
                            echo "<option value=" . $atividade['id_atividade'] . " >" . $atividade['nome_atividade'] . "</option>";
                        endforeach;
                        ?>
                    </select>
                    <br />
                    <br />
                </div> 
                <div>
                    <label class="control-label">Data de Inicio da Subatividade:</label><br />
                    <input class="form-control" name="data_inicio_sub_atividade" placeholder="Nome da Atividade" type="date"><br />
                    <br />
                </div>
                <div>
                    <label class="control-label">Data de Fim da Subatividade:</label><br />
                    <input class="form-control" name="data_fim_sub_atividade" placeholder="Nome da Atividade" type="date"><br />
                    <br />
                </div>
                <div>
                    <label class="control-label">Data de Validação da Subatividade:</label><br />
                    <input class="form-control" name="data_validacao_sub_atividade" placeholder="Nome da Atividade" type="date"><br />
                    <br />
                </div>
                <div>
                    <label class="control-label">Observação:</label><br />
                    <input class="form-control" name="observacoes_sub_atividade" placeholder="Observação" type="text"><br />
                    <br />
                </div>
                <table>
                    <tr>
                        <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                        <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/subatividade">Voltar</a></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>