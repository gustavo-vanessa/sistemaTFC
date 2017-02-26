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

        <form method="post" action="<?php echo BASE_URL; ?>/projeto/add">
            <div class="div_form ">
                <div>
                    <label class="control-label">Nome do Projeto:</label><br />
                    <input class="form-control" name="nome_projeto" placeholder="Nome da Atividade" type="text"><br />
                    <br />
                </div>    
                <div>
                    <label class="control-label">Status do Projeto:</label><br />
                    <select  class="form-control" name="status_projeto">
                        <option>Selecione</option>    
                        <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                    </select>
                    <br />
                    <br />
                </div> 
                <div>
                    <label class="control-label">Orientador:</label><br />
                    <select  class="form-control" name="id_orientador">
                        <option>Selecione</option>    
                        <?php foreach ($orientadores as $orientador): ?>
                            <?php echo "<option value=" . $orientador['id_usuario'] . " >" . $orientador['nome_usuario'] . "</option>"; ?>
                        <?php endforeach; ?>
                    </select>
                    <br />
                    <br />
                </div> 
                <div>
                    <label class="control-label">Orientando:</label><br />
                    <select  class="form-control" name="id_orientando">
                        <option>Selecione</option>    
                        <?php foreach ($orientandos as $orientando): ?>
                            <?php echo "<option value=" . $orientando['id_usuario'] . " >" . $orientando['nome_usuario'] . "</option>"; ?>
                        <?php endforeach; ?>
                    </select>
                    <br />
                    <br />
                </div> 
                <div>
                    <label class="control-label">Versão do PMBOK:</label><br />
                    <select  class="form-control" name="id_pmbok_versao">
                        <option>Selecione</option>    
                        <?php foreach ($pmboks as $pmbok): ?>
                            <?php echo "<option value=" . $pmbok['id_pmbok_versao'] . " >" . $pmbok['descricao_pmbok_versao'] . "</option>"; ?>
                        <?php endforeach; ?>
                    </select>
                    <br />
                    <br />
                </div> 
                <div>
                    <label class="control-label">Data Validação:</label><br />
                    <input class="form-control" name="data_validacao"  type="date"><br />
                    <br />
                </div>    

                    <table>
                        <tr>
                            <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/perfil">Voltar</a></td>
                        </tr>
                    </table>
  
            </div>
        </form>
    </body>
</html>