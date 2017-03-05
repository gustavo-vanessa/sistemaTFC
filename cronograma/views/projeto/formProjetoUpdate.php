<?php foreach ($projetos as $projeto): ?>

    <form method="post" action="<?php echo BASE_URL . "/projeto/alterar/" . $projeto['id_projeto']; ?>">

        <div class="div_form " id="scroll">
            <label class="titulo">Projetos</label>
            <div>
                <label class="control-label">Nome do Projeto: *</label><br />
                <input class="form-control" required value="<?php echo $projeto['nome_projeto']; ?>" name="nome_projeto" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>    
            <div>
                <label class="control-label">Status do Projeto: *</label><br />
                <select  class="form-control" required name="status_projeto">
                    <option>Selecione</option>    
                    <option value="A">Ativo</option>
                    <option value="I">Inativo</option>
                </select>
                <br />
                <br />
            </div> 
            <div>
                <label class="control-label">Orientador: *</label><br />
                <select  class="form-control" required name="id_orientador">
                    <option>Selecione</option>    
                    <?php foreach ($orientadores as $orientador): ?>
                        <?php echo "<option value=" . $orientador['id_usuario'] . " >" . $orientador['nome_usuario'] . "</option>"; ?>
                    <?php endforeach; ?>
                </select>
                <br />
                <br />
            </div> 
            <div>
                <label class="control-label">Orientando: *</label><br />
                <select  class="form-control" required name="id_orientando">
                    <option>Selecione</option>    
                    <?php foreach ($orientandos as $orientando): ?>
                        <?php echo "<option value=" . $orientando['id_usuario'] . " >" . $orientando['nome_usuario'] . "</option>"; ?>
                    <?php endforeach; ?>
                </select>
                <br />
                <br />
            </div>  
            <div>
                <label class="control-label">Data Validação:</label><br />
                <input class="form-control" value="<?php echo $projeto['data_validacao']; ?>" name="data_validacao"  type="date"><br />
                <br />
            </div>    
        <?php endforeach; ?>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/projeto">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>