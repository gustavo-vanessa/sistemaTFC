
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
                <th id="el">Ações</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $id_atividade;
            $nome_atividade;
            $status_atividade;
            $nome_projeto;
            $data_inicio_atividade;
            foreach ($atividades as $atividade) {
                echo "<tr>";
                echo "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['id_atividade'],  ENT_QUOTES,  "utf-8") . "'></td>";
                print "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['nome_atividade'],  ENT_QUOTES,  "utf-8") . "'></td>";
                echo "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['status_atividade'],  ENT_QUOTES,  "utf-8") . "'></td>";
                echo "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['nome_projeto'],  ENT_QUOTES,  "utf-8") . "'></td>";
                echo "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['data_inicio_atividade'],  ENT_QUOTES,  "utf-8") . "'></td>";
                echo "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['data_fim_atividade'],  ENT_QUOTES,  "utf-8") . "'></td>";
                echo "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['data_validacao_atividade'],  ENT_QUOTES,  "utf-8") . "'></td>";
                echo "<td><input class='table_input' type='text' value='" .  htmlentities($atividade['observacoes_atividade'],  ENT_QUOTES,  "utf-8") . "'></td>";
                echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " .  htmlentities(BASE_URL,  ENT_QUOTES,  "utf-8") . "atividade/formAlterar/" .  htmlentities($atividade['id_atividade'],  ENT_QUOTES,  "utf-8") . ">Alterar</td>";
                echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " .  htmlentities(BASE_URL,  ENT_QUOTES,  "utf-8") . "atividade/excluir/" .  htmlentities($atividade['id_atividade'],  ENT_QUOTES,  "utf-8") . ">Excluir</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo  htmlentities(BASE_URL,  ENT_QUOTES,  "utf-8"); ?>atividade/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo  htmlentities(BASE_URL,  ENT_QUOTES,  "utf-8").'home/'.$_SESSION['nome_perfil']?>">Voltar</a></td>
        </tr></table>
    <br />
   
</div>