
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
                echo "<td>" . $atividade['id_atividade'] . "</td>";
                echo "<td>" . $atividade['nome_atividade'] . "</td>";
                echo "<td>" . $atividade['status_atividade'] . "</td>";
                echo "<td>" . $atividade['nome_projeto'] . "</td>";
                echo "<td>" . $atividade['data_inicio_atividade'] . "</td>";
                echo "<td>" . $atividade['data_fim_atividade'] . "</td>";
                echo "<td>" . $atividade['data_validacao_atividade'] . "</td>";
                echo "<td>" . $atividade['observacoes_atividade'] . "</td>";
                foreach ($subatividades as $subatividade) {
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td>" . $subatividade['id_sub_atividade'] . "</td>";
                    echo "<td>" . $subatividade['nome_sub_atividade'] . "</td>";
                    echo "<td>" . $subatividade['status_sub_atividade'] . "</td>";
                    echo "<td>" . $subatividade['data_inicio_sub_atividade'] . "</td>";
                    echo "<td>" . $subatividade['data_fim_sub_atividade'] . "</td>";
                    echo "<td>" . $subatividade['data_validacao_sub_atividade'] . "</td>";
                    echo "<td>" . $subatividade['observacoes_sub_atividade'] . "</td>";
                    echo "</tr> ";
                }
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividade/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividadePadrao/atividadesPadraoProjeto">Adicionar Atividades Padrões</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'home/' . $_SESSION['nome_perfil'] ?>">Voltar</a></td>
        </tr></table>
    <br />

</div>