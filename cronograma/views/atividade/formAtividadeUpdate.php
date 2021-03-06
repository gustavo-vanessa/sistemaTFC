<?php foreach ($atividades as $atividade): ?> 
    <form method="post" action="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividade/alterar/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8"); ?>">
        <div class="div_form" id="scroll">
            
            <label class="titulo">Alterar Atividade</label>
            <div>
                <label class="control-label">Nome da Atividade:</label><br />
                <input class="form-control" required value="<?php echo htmlentities($atividade['nome_atividade'], ENT_QUOTES, "utf-8") ?>" name="nome_atividade" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>  
            <div>
                <label class="control-label">Data de Inicio da Atividade: *</label><br />
                <input class="form-control" required value="<?php echo htmlentities($atividade['data_inicio_atividade'], ENT_QUOTES, "utf-8") ?>" name="data_inicio_atividade"  type="date"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Data de Fim da Atividade: *</label><br />
                <input class="form-control" required value="<?php echo htmlentities($atividade['data_fim_atividade'], ENT_QUOTES, "utf-8") ?>" name="data_fim_atividade" type="date"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Observação:</label><br />
                <input class="form-control" value="<?php echo htmlentities($atividade['observacoes_atividade'], ENT_QUOTES, "utf-8") ?>" name="observacoes_atividade" placeholder="Observações" type="text"><br />
                <br />
            </div>
<?php endforeach; ?>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . 'atividade/atividadesProjeto/' . htmlentities($_SESSION['id_projeto'], ENT_QUOTES, "utf-8") ?>">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>