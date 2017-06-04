<?php
if (!isset($_SESSION)) {
    session_start();
}


?>
<div class="div_form" id="scroll">
    <label class="titulo">Projetos</label>
    <?php
    
    if ($_SESSION['nome_perfil'] != 'Orientando') {
        echo "<div class='filtro' id='filtro'>";
        echo "<label class='textofiltro'>Filtro</label>";
        echo "<form method='post' action=" . BASE_URL . "projeto/filtro>";
        
        if ($_SESSION['nome_perfil'] == 'Coordenador') {
            echo " <div>";
            echo "     <label class='control-label'>Orientador: </label><br />";
            echo "     <select  class='form-control' name='id_orientador'>";
            echo "<option value='0' selected>Selecione</option>";
            foreach ($orientadores as $orientador) {
                echo "<option value=" . $orientador['id_usuario'] . ">" . $orientador['nome_usuario'] . "</option>";
            }
            echo "     </select>";
            echo "     <br />";
            echo "     <br />";
            echo " </div> ";
        }
        echo " <div>";
        echo "     <label class='control-label'>Orientando:</label><br />";
        echo "     <select  class='form-control' name='id_orientando'>";
        echo "<option value='0' selected>Selecione</option>";
        foreach ($orientandos as $orientando) {
            echo "<option value=" . $orientando['id_usuario'] . ">" . $orientando['nome_usuario'] . "</option>";
        }
        echo "     </select>";
        echo "     <br />";
        echo "     <br />";
        echo " </div>  ";

        echo "            <table> ";
        echo "                <tr> ";
        echo "                    <td><input type='submit' name='submit' value='Filtrar' class='btn btn-padrao btn-shadow btn-rc'/></td> ";
        echo "                </tr> ";
        echo "            </table> ";
        echo "    </div> ";
    }
    
    

    if ($retornos != 'vazio') {
        if ($retornos['id'] === 0) {
            echo " <div class='success'>";
            echo "<label>" . $retornos['msg'] . "</label>";
            echo"</div>";

            header("refresh: 2;");
        } else {
            echo " <div class='warning'>";
            echo "<label>" . $retornos['msg'] . "</label>";
            echo"</div>";
            header("refresh: 2;");
        }
    }
    ?>
    
    <table class="table th td" >
        <thead>
            <tr>
                <th> Cód </th>
                <th>Nome </th>
                <th>Status </th>
                <th>Data Validação</th>
                <th>Orientador</th>
                <th>Orientando</th>
                <th>PMBOK Versão</th>
                <th id="el">Ações</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($projetos as $projeto) {
                echo "<tr>";
                echo "<td>" . $projeto['id_projeto'] . "</td>";
                echo "<td>" . $projeto['nome_projeto'] . "</td>";
                echo "<td>" . $projeto['status_projeto'] . "</td>";
                echo "<td>" . $projeto['data_validacao'] . "</td>";
                echo "<td>" . $projeto['nome_orientador'] . "</td>";
                echo "<td>" . $projeto['nome_orientando'] . "</td>";
                echo "<td>" . $projeto['desc_pmbok'] . "</td>";
                echo "<div id='rel'>";
                if (!isset($projeto['data_validacao']) && $_SESSION['nome_perfil'] == 'Orientando') {
                    echo "<td id='rel2' ><a  class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "gantt/ganttProjeto/" . $projeto['id_projeto'] . ">Relatório Gantt</td>";
                    echo "<td><a id='rel3' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "atividade/atividadesProjeto/" . $projeto['id_projeto'] . ">Atividades</td>";
                    echo "<td><a id='rel4' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "projeto/formAlterar/" . $projeto['id_projeto'] . ">Alterar</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td><a id='rel5' class='btn btn-excluir btn-shadow btn-rc' href = " . BASE_URL . "projeto/excluir/" . $projeto['id_projeto'] . ">Excluir</td>";
                } else if ($_SESSION['nome_perfil'] != 'Orientando') {
                    if (!isset($projeto['data_validacao'])) {
                        echo "<td><a id='rel2' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "projeto/validarProjeto/" . $projeto['id_projeto'] . ">Validar Projeto</td>";
                    }
                    echo "<td><a id='rel3' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "gantt/ganttProjeto/" . $projeto['id_projeto'] . ">Relatório Gantt</td>";
                    echo "<td><a id='rel4' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "atividade/atividadesProjeto/" . $projeto['id_projeto'] . ">Atividades</td>";
                    echo "<td><a id='rel5' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "projeto/formAlterar/" . $projeto['id_projeto'] . ">Alterar</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td><a  id='rel6' class='btn btn-excluir btn-shadow btn-rc' href = " . BASE_URL . "projeto/excluir/" . $projeto['id_projeto'] . ">Excluir</td>";
                } else {
                    echo "<td><a id='rel2' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "gantt/ganttProjeto/" . $projeto['id_projeto'] . ">Relatório Gantt</td>";
                    echo "<td><a id='rel3' class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "atividade/atividadesProjeto/" . $projeto['id_projeto'] . ">Atividades</td>";
                }
                echo "</div'>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table id="el"><tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>projeto/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="javascript:genPDF()" target="_blank">Relatório</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'home/' . $_SESSION['nome_perfil'] ?>">Voltar</a></td>
        </tr></table>
</div>