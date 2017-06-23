
    
<div class="div_form" id="scroll">
    <label class="titulo">Subtividades Padrões</label>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Atividade Principal</th>
                <th>Obrigatório</th>
                <th id="el">Ações</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($subatividadesPadroes as $subatividadePadrao) {
                echo "<tr>";
                echo "<td>" . $subatividadePadrao['id_sub_atividades_padroes'] . "</td>";
                echo "<td>" . $subatividadePadrao['nome_sub_atividade_padroes'] . "</td>";
                echo "<td>" . $subatividadePadrao['descricao_sub_atividades_padroes'] . "</td>";
                echo "<td>" . $subatividadePadrao['nome_atividade'] . "</td>";
                echo "<td>";
                if ($subatividadePadrao['ie_obrigatorio_sub_atividades_padroes'] == 'S') {
                    echo "<label class='switch'>  <input type='checkbox' checked disabled> <div class='slider round'></div> </label>";
                } else {
                    echo "<label class='switch'>  <input type='checkbox' disabled> <div class='slider round'></div> </label>";
                }
                echo "</td>";
                echo "<td ><a class = 'btn btn-alterar btn-shadow btn-rc' href = " . BASE_URL . "subatividadePadrao/formAlterar/" . $subatividadePadrao['id_sub_atividades_padroes'] . ">Alterar</td>";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td><a class = 'btn btn-excluir btn-shadow btn-rc' href = " . BASE_URL . "subatividadePadrao/excluir/" . $subatividadePadrao['id_sub_atividades_padroes'] . ">Excluir</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>subatividadePadrao/form_add">Adicionar</a></td>
            <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL.'home/'.$_SESSION['nome_perfil']?>">Voltar</a></td>
        </tr></table>
</div>
