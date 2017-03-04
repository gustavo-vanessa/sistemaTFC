<?php foreach ($subatividades as $subatividade): ?> 

    <form method="post" action="<?php echo BASE_URL . "/subatividade/alterar/" . $subatividade['id_sub_atividade']; ?>">
        <div class="div_form ">
            <div>
                <label class="control-label">Nome da Atividade:</label><br />
                <input class="form-control" required value="<?php echo $subatividade['nome_sub_atividade'] ?>" name="nome_sub_atividade" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>  
            <div>
                <label class="control-label">Status Atividade:</label><br />
                <select  class="form-control" required name="status_sub_atividade">
                    <option>Selecione</option>    
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
                <br />
                <br />
            </div>
            <div>
                <label class="control-label">Atividade:</label><br />
                <select  class="form-control" required name="id_atividade">
                    <option>Selecione</option>    
                    <?php foreach ($atividades as $atividade): ?>
                        <?php
                        if ($atividade['id_atividade'] == $subatividade['id_atividade']) {
                            echo '<option value=' . $atividade['id_atividade'] . ' selected>' . $atividade['nome_atividade'] . '</option>"';
                        } else {
                            echo "<option value=" . $atividade['id_atividade'] . " >" . $atividade['nome_atividade'] . "</option>";
                        }
                        ?>
                    <?php endforeach; ?>
                </select>
                <br />
                <br />
            </div> 
            <div>
                <label class="control-label">Data de Inicio da Atividade:</label><br />
                <input class="form-control" required value="<?php echo $subatividade['data_inicio_sub_atividade'] ?>" name="data_inicio_sub_atividade" placeholder="Nome da Atividade" type="date"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Data de Fim da Atividade:</label><br />
                <input class="form-control" required value="<?php echo $subatividade['data_fim_sub_atividade'] ?>" name="data_fim_sub_atividade" placeholder="Nome da Atividade" type="date"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Data de Validação da Atividade:</label><br />
                <input class="form-control" value="<?php echo $subatividade['data_validacao_sub_atividade'] ?>" name="data_validacao_sub_atividade" placeholder="Nome da Atividade" type="date"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Observação:</label><br />
                <input class="form-control" value="<?php echo $subatividade['observacoes_sub_atividade'] ?>" name="observacoes_sub_atividade" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>
<?php endforeach; ?>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/subatividade">Voltar</a></td>
            </tr>
        </table>

    </div>
</form>