<form method="post" action="<?php echo BASE_URL; ?>/atividadePadrao/add">
    <div class="div_form scroll">
        <label class="titulo">Atividades Padrões</label>
        <div>
            <label class="control-label">Nome da Atividade Padrão: *</label><br />
            <input class="form-control" name="nome_atividade_padrao" required placeholder="Nome da Atividade Padrão" type="text"><br />
            <br />
        </div>  
        <div>
            <label class="control-label">Descrição da Atividade Padrão: *</label><br />
            <input class="form-control" name="desc_atividade_padrao" required placeholder="Descrição da Atividade Padrão" type="text"><br />
            <br />
        </div>
        <div>
            <label class="control-label">Versão do PMBOK: *</label><br />
            <select  class="form-control" required name="id_pmbok_versao">
                <option>Selecione</option>    
                <?php foreach ($pmboks as $pmbok): ?>
                    <?php echo "<option value=" . $pmbok['id_pmbok_versao'] . " >" . $pmbok['descricao_pmbok_versao'] . "</option>"; ?>
                <?php endforeach; ?>
            </select><br /><br />
        </div> 
        <div>
            <label class="control-label">Atividade Padrão Obrigatória: *</label><br />
            <select  class="form-control" required name="ie_obrigatorio">
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
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>