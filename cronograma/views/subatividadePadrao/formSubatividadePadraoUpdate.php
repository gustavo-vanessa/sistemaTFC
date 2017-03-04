<?php foreach ($atividadesPadroes as $atividadePadrao): ?> 

    <form method="post" action="<?php echo BASE_URL . "/atividadePadrao/alterar/" . $atividadePadrao['id_atividades_padroes']; ?>">
        <div class="div_form ">
            <div>
                <label class="control-label">Nome da Atividade:</label><br />
                <input class="form-control" required value="<?php echo $atividadePadrao['nome_atividades_padroes'] ?>" name="nome_atividade_padrao" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>  
            <div>
                <label class="control-label">Descrição da Atividade:</label><br />
                <input class="form-control" required value="<?php echo $atividadePadrao['descricao_atividades_padroes'] ?>" name="desc_atividade_padrao" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Versão do PMBOK:</label><br />
                <select  class="form-control" required name="id_pmbok_versao">
                    <option>Selecione</option>    
                    <?php foreach ($pmboks as $pmbok): ?>
                        <?php
                        if ($pmbok['id_pmbok_versao'] == $atividadePadrao['id_pmbok_versao']) {
                            echo '<option value=' . $pmbok['id_pmbok_versao'] . ' selected>' . $pmbok['descricao_pmbok_versao'] . '</option>"';
                        } else {
                            echo "<option value=" . $pmbok['id_pmbok_versao'] . " >" . $pmbok['descricao_pmbok_versao'] . "</option>";
                        }
                        ?>
                    <?php endforeach; ?>
                </select>
            </div> 
            <div>
                <label class="control-label">Atividade Obrigatória:</label><br />
                <select  class="form-control" required name="ie_obrigatorio">
                    <option>Selecione</option>    
                    <option value="S" >Sim</option>
                    <option value="N">Não</option>
                </select>
                <br />
                <br />
            </div>     
        <?php endforeach; ?>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/atividadePadrao">Voltar</a></td>
            </tr>
        </table>

    </div>
</form>