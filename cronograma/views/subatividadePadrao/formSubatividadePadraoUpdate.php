
<?php foreach ($subatividadesPadroes as $subatividadePadrao): ?> 

    <form method="post" action="<?php echo BASE_URL . "subatividadePadrao/alterar/" . $subatividadePadrao['id_sub_atividades_padroes']; ?>">
        <div class="div_form " id="scroll">
            <label class="titulo">Subtividades Padrões</label>
            <div>
                <label class="control-label">Nome da Subatividade Padrão: *</label><br />
                <input class="form-control" required value="<?php echo $subatividadePadrao['nome_sub_atividade_padroes'] ?>" name="nome_subatividade_padrao" placeholder="Nome da Subatividade Padrão" type="text"><br />
                <br />
            </div>  
            <div>
                <label class="control-label">Descrição da Subatividade Padrão: *</label><br />
                <input class="form-control" required value="<?php echo $subatividadePadrao['descricao_sub_atividades_padroes'] ?>" name="desc_subatividade_padrao" placeholder="Descrição da Subatividade Padrão" type="text"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Atividade Principal: *</label><br />
                <select  class="form-control" required name="id_atividade">
                    <option>Selecione</option>    
                    <?php foreach ($atividadesPadroes as $atividadePadrao): ?>
                        <?php
                        if ($atividadePadrao['id_atividades_padroes'] == $subatividadePadrao['id_atividades_padroes']) {
                            echo '<option value=' . $atividadePadrao['id_atividades_padroes'] . ' selected>' . $atividadePadrao['nome_atividades_padroes'] . '</option>"';
                        } else {
                            echo "<option value=" . $atividadePadrao['id_atividades_padroes'] . " >" . $atividadePadrao['nome_atividades_padroes'] . "</option>";
                        }
                        ?>
                    <?php endforeach; ?>
                </select>
                <br />
                <br />
            </div> 
            <div>
                <label class="control-label">Subatividade Padrão Obrigatória: *</label><br />
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
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>subatividadePadrao">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>
