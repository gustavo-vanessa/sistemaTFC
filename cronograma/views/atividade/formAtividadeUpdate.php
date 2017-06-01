<?php foreach ($atividades as $atividade): ?> 

    <form method="post" action="<?php echo BASE_URL . "atividade/alterar/" . $atividade['id_atividade']; ?>">
        <div class="div_form" id="scroll">
            <label class="titulo">Atividades</label>
            <div>
                <label class="control-label">Nome da Atividade:</label><br />
                <input class="form-control" required value="<?php echo $atividade['nome_atividade'] ?>" name="nome_atividade" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>  
            <div>
                <label class="control-label">Data de Inicio da Atividade: *</label><br />
                <input class="form-control" required value="<?php echo $atividade['data_inicio_atividade'] ?>" name="data_inicio_atividade"  type="date"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Data de Fim da Atividade: *</label><br />
                <input class="form-control" required value="<?php echo $atividade['data_fim_atividade'] ?>" name="data_fim_atividade" type="date"><br />
                <br />
            </div>
            <div>
                <label class="control-label">Observação:</label><br />
                <input class="form-control" value="<?php echo $atividade['observacoes_atividade'] ?>" name="observacoes_atividade" placeholder="Observações" type="text"><br />
                <br />
            </div>
<?php endforeach; ?>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'atividade/atividadesProjeto/' . $_SESSION['id_projeto'] ?>">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>