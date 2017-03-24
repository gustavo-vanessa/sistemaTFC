<form method="POST" action="<?php BASE_URL; echo '../atividade/addPadrao';?>">
<div class="div_form" id="scroll">
    <label class="titulo">Atividades e Subatividades Padrões</label>
    <table class="table th td" >
        <tbody>
            <?php
            foreach ($atividades as $atividade) {
                echo "<tr>";
                echo "<td> <input class='table_input' name='id_atividade' id = 'id_atividade' type='text' value='" . $atividade['id_atividades_padroes'] . "'></td>";
                echo "<td> <input class='table_input' name='nome_atividade' id = 'nome_atividade' type='text' value='" . $atividade['nome_atividades_padroes'] . "'></td>";
                echo "<td> <input class='table_input' name='descr_atividade' id = 'descr_atividade' type='text' value='" . $atividade['descricao_atividades_padroes'] . "'></td>";
                echo "<td> <option class='table_input' name='id_pmbok' id= 'id_pmbok' type='text' value='" . $atividade['id_pmbok_versao'] . "'>".$atividade['desc_pmbok']."</td>";
                echo "<td>";
                if ($atividade['ie_obrigatorio_atividades_padroes'] == 'S') {
                    echo "<label class='switch'>  <input type='checkbox' id='obrigatorio_atividade' checked disabled> <div class='slider round'></div> </label>";
                } else {
                    echo "<label class='switch'>  <input type='checkbox' id = 'obrigatorio_atividade' disabled> <div class='slider round'></div> </label>";
                }
                echo "</td>";
                foreach ($subatividades as $subatividade) {
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td><input class='table_input' name='id_subatividade' id='id_subatividade' type='text' value='" . $subatividade['id_sub_atividades_padroes'] . "'></td>";
                    echo "<td><input class='table_input' name='nome_subatividade' id='nome_subatividade' type='text' value='" . $subatividade['nome_sub_atividade_padroes'] . "'></td>";
                    echo "<td><input class='table_input' name='desc_subatividade' id='desc_subatividade' type='text' value='" . $subatividade['descricao_sub_atividades_padroes'] . "'></td>";
                    echo "<td>";
                    if ($subatividade['ie_obrigatorio_sub_atividades_padroes'] == 'S') {
                        echo "<label class='switch'>  <input type='checkbox' id='obrigatorio_subatividade' checked disabled> <div class='slider round'></div> </label>";
                    } else {
                        echo "<label class='switch'>  <input type='checkbox' id='obrigatorio_subatividade' disabled> <div class='slider round'></div> </label>";
                    }
                    echo "</td>";
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
            <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividade/form_add">Adicionar Atividade</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>subatividade/form_add">Adicionar Sub Atividade</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'projeto'?>">Voltar</a></td>
        </tr></table>
    <br />

</div>
    
    </form>