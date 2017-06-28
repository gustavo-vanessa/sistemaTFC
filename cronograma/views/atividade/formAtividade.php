<form method="post" action="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") ?>atividade/add">
    <div class="div_form" id="scroll">
        
        <label class="titulo">Incluir Atividade</label>

        <div>
            <label class="control-label">Nome da Atividade: *</label><br />
            <input class="form-control" name="nome_atividade" required placeholder="Nome da Atividade" type="text"><br />
            <br />
        </div>  
        <div>
            <label class="control-label">Projeto: *</label><br />
            <select  class="form-control" required name="id_projeto">
                <option>Selecione</option>    
                <?php
                foreach ($projetos as $projeto):
                    echo "<option value=" . htmlentities($projeto['id_projeto'], ENT_QUOTES, "utf-8") . " >" . htmlentities($projeto['nome_projeto'], ENT_QUOTES, "utf-8") . "</option>";
                endforeach;
                ?>
            </select>
            <br />
            <br />
        </div> 
        <div>
            <label class="control-label">Data de Inicio da Atividade: *</label><br />
            <input class="form-control" name="data_inicio_atividade" required  type="date"><br />
            <br />
        </div>
        <div>
            <label class="control-label">Data de Fim da Atividade: *</label><br />
            <input class="form-control" name="data_fim_atividade" required type="date"><br />
            <br />
        </div>
        <div>
            <label class="control-label">Observação:</label><br />
            <input class="form-control" name="observacoes_atividade" placeholder="Observação" type="text"><br />
            <br />
        </div>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . 'atividade/atividadesProjeto/' . htmlentities($_SESSION['id_projeto'], ENT_QUOTES, "utf-8") ?>">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>