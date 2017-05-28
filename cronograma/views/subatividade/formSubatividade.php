<form method="post" action="<?php echo BASE_URL ?>subatividade/add">
    <div class="div_form " id="scroll">
        <label class="titulo">Subatividades</label>
        <div>
            <label class="control-label">Nome da Subatividade: *</label><br />
            <input class="form-control" name="nome_sub_atividade" required placeholder="Nome da Subatividade" type="text"><br />
            <br />
        </div>  
        <div>
            <label class="control-label">Atividade: *</label><br />
            <select  class="form-control" required name="id_atividade">
                <?php
                foreach ($atividades as $atividade):
                    echo "<option value=" . $atividade['id_atividade'] . " selected>" . $atividade['nome_atividade'] . "</option>";
                endforeach;
                ?>
            </select>
            <br />
            <br />
        </div> 
        <div>
            <label class="control-label">Data de Inicio da Subatividade: *</label><br />
            <input class="form-control" name="data_inicio_sub_atividade" required type="date"><br />
            <br />
        </div>
        <div>
            <label class="control-label">Data de Fim da Subatividade: *</label><br />
            <input class="form-control" name="data_fim_sub_atividade" required type="date"><br />
            <br />
        </div>
       <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>projeto">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>