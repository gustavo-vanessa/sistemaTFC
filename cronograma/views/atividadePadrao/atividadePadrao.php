
<div class="div_form" id="scroll">
    
    <label class="titulo">Atividades Padrões</label>
    <?php
    if ($retornos != 'vazio') {
        if ($retornos['id'] === 0) {
            echo " <div class='success'>";
            echo "<label>" . htmlentities($retornos['msg'], ENT_QUOTES, "utf-8") . "</label>";
            echo"</div>";

            header("refresh: 2;");
        } else {
            echo " <div class='warning'>";
            echo "<label>" . htmlentities($retornos['msg'], ENT_QUOTES, "utf-8") . "</label>";
            echo"</div>";
            header("refresh: 2;");
        }
    }
    ?>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>PMBOK</th>
                <th id="el">Ações</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($atividadesPadroes as $atividadePadrao) {
                
                echo "<tr>";
                echo "<td>" . htmlentities($atividadePadrao['id_atividades_padroes'], ENT_QUOTES, "utf-8") . "</td>";
                echo "<td>" . htmlentities($atividadePadrao['nome_atividades_padroes'], ENT_QUOTES, "utf-8") . "</td>";
                echo "<td>" . htmlentities($atividadePadrao['descricao_atividades_padroes'], ENT_QUOTES, "utf-8") . "</td>";
                echo "<td>" . htmlentities($atividadePadrao['desc_pmbok'], ENT_QUOTES, "utf-8") . "</td>";
                echo "<td ><a class = 'btn btn-alterar btn-shadow btn-rc' href = " . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividadePadrao/formAlterar/" . htmlentities($atividadePadrao['id_atividades_padroes'], ENT_QUOTES, "utf-8") . ">Alterar</td>";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td></td> ";
                echo "<td><a class = 'btn btn-excluir btn-shadow btn-rc ' href = " . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividadePadrao/excluir/" . htmlentities($atividadePadrao['id_atividades_padroes'], ENT_QUOTES, "utf-8") . ">Excluir</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table id="el">
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8"); ?>atividadePadrao/form_add">Adicionar</a></td>
            <td><a class="btn btn-relatorio btn-shadow btn-rc" href="javascript:genPDF()" target="_blank">Relatório</a></td>
            <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . 'home/' . htmlentities($_SESSION['nome_perfil'], ENT_QUOTES, "utf-8"); ?>">Voltar</a></td>
        </tr></table>
</div>