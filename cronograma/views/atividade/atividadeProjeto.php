
<div class="div_form" id="scroll">
    <label class="titulo">Atividades e Subatividades</label>
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
                if(!isset($atividade['data_validacao_atividade'])||$_SESSION['nome_perfil'] != 'Orientando'){
                     echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."atividade/alterar/".$atividade['id_atividade']."'>Alterar</a></td>";
                      echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."atividade/excluir/".$atividade['id_atividade']."'>Excluir</a></td>";
                }
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
                    if(!isset( $subatividade['data_validacao_sub_atividade'] )||$_SESSION['nome_perfil'] != 'Orientando'){
                        echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."subatividade/formAlterar/".$subatividade['id_sub_atividade']."'>Alterar</a></td>";
                        echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."subatividade/excluir/".$subatividade['id_sub_atividade']."'>Excluir</a></td>";
                    }
                    echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."subatividade/executar/".$subatividade['id_sub_atividade']."'>Executar</a></td>";
                if ($_SESSION['nome_perfil'] != 'Orientando') {
                    echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."subatividade/validar/".$subatividade['id_sub_atividade']."'>Validar</a></td>";
                }
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
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividadePadrao/atividadesPadraoProjeto">Adicionar Atividades e Subatividades</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'projeto' ?>">Voltar</a></td>
        </tr></table>
    <br />

</div>