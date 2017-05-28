
<div class="div_form" id="scroll">
     <label class="titulo">Atividades Padrões</label>
     
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>PMBOK</th>
                <th>Obrigatório</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($atividadesPadroes as $atividadePadrao) {
                echo "<tr>";
                echo "<td>" . $atividadePadrao['id_atividades_padroes'] . "</td>";
                echo "<td>" . $atividadePadrao['nome_atividades_padroes'] . "</td>";
                echo "<td>" . $atividadePadrao['descricao_atividades_padroes'] . "</td>";
                echo "<td>" . $atividadePadrao['desc_pmbok'] . "</td>";
                echo "<td>";
                if ($atividadePadrao['ie_obrigatorio_atividades_padroes'] == 'S') {
                    echo "<label class='switch'>  <input type='checkbox' checked disabled> <div class='slider round'></div> </label>";
                } else {
                    echo "<label class='switch'>  <input type='checkbox' disabled> <div class='slider round'></div> </label>";
                }
                echo "</td>";
                echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "atividadePadrao/formAlterar/" . $atividadePadrao['id_atividades_padroes'] . ">Alterar</td>";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td><a class = 'btn btn-excluir btn-shadow btn-rc ' href = " . BASE_URL . "atividadePadrao/excluir/" . $atividadePadrao['id_atividades_padroes'] . ">Excluir</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividadePadrao/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'atividadePadrao/relatorio' ?>" target="_blank">Relatório</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL.'home/'.$_SESSION['nome_perfil']?>">Voltar</a></td>
        </tr></table>
</div>