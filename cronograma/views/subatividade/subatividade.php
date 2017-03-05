
<div class="div_form">
    <label class="titulo">Subatividades</label>
    
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Status</th>
                <th>Atividade</th>
                <th>Data Inicio</th>
                <th>Data Fim</th>
                <th>Data Validação</th>
                <th>Observações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($subatividades as $subatividade) {
                echo "<tr>";
                echo "<td>" . $subatividade['id_sub_atividade'] . "</td>";
                echo "<td>" . $subatividade['nome_sub_atividade'] . "</td>";
                echo "<td>" . $subatividade['status_sub_atividade'] . "</td>";
                echo "<td>" . $subatividade['nome_atividade'] . "</td>";
                echo "<td>" . $subatividade['data_inicio_sub_atividade'] . "</td>";
                echo "<td>" . $subatividade['data_fim_sub_atividade'] . "</td>";
                echo "<td>" . $subatividade['data_validacao_sub_atividade'] . "</td>";
                echo "<td>" . $subatividade['observacoes_sub_atividade'] . "</td>";
                echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/subatividade/formAlterar/" . $subatividade['id_sub_atividade'] . ">Alterar</td>";
                echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/subatividade/excluir/" . $subatividade['id_sub_atividade'] . ">Excluir</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>/subatividade/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
        </tr></table>
</div>