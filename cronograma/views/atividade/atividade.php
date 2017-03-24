
<div class="div_form" id="scroll">
    <label class="titulo">Atividades</label>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Status</th>
                <th>Projeto</th>
                <th>Data Inicio</th>
                <th>Data Fim</th>
                <th>Data Validação</th>
                <th>Observações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($atividades as $atividade) {
                echo "<tr>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['id_atividade'] . "'></td>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['nome_atividade'] . "'></td>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['status_atividade'] . "'></td>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['nome_projeto'] . "'></td>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['data_inicio_atividade'] . "'></td>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['data_fim_atividade'] . "'></td>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['data_validacao_atividade'] . "'></td>";
                echo "<td><input class='table_input' type='text' value='" . $atividade['observacoes_atividade'] . "'></td>";
                echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "atividade/formAlterar/" . $atividade['id_atividade'] . ">Alterar</td>";
                echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "atividade/excluir/" . $atividade['id_atividade'] . ">Excluir</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividade/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL.'home/'.$_SESSION['nome_perfil']?>">Voltar</a></td>
        </tr></table>
    <br />
   
</div>