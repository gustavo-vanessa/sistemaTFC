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

        <form method="post" action="<?php echo BASE_URL; ?>/subatividadePadrao/add">
            <div class="div_form ">
                <div>
                    <label class="control-label">Nome da subatividade:</label><br />
                    <input class="form-control" name="nome_subatividade_padrao" placeholder="Nome da Atividade" type="text"><br />
                    <br />
                </div>  
                <div>
                    <label class="control-label">Descrição da subatividade:</label><br />
                    <input class="form-control" name="desc_subatividade_padrao" placeholder="Nome da Atividade" type="text"><br />
                    <br />
                </div>
                <div>
                    <label class="control-label">Atividade principal:</label><br />
                    <select  class="form-control" name="id_atividade">
                        <option>Selecione</option>    
                        <?php foreach ($atividadesPadroes as $atividadePadrao): ?>
                            <?php echo "<option value=" . $atividadePadrao['id_atividades_padroes'] . " >" . $atividadePadrao['nome_atividades_padroes'] . "</option>"; ?>
                        <?php endforeach; ?>
                    </select>
                    <br />
                </div> 
                <div>
                    <label class="control-label">Atividade Obrigatória:</label><br />
                    <select  class="form-control" name="ie_obrigatorio">
                        <option>Selecione</option>    
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>
                    <br />
                    <br />
                </div>     

                    <table>
                        <tr>
                            <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/atividadePadrao">Voltar</a></td>
                        </tr>
                    </table>
  
            </div>
        </form>
    </body>
</html>