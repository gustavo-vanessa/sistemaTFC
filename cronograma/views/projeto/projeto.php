
<div class="div_form" id="scroll">
    <label class="titulo">Projetos</label>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Status</th>
                <th>Data Validação</th>
                <th>Orientador</th>
                <th>Orientando</th>
                <th>PMBOK Versão</th>
                <th>Ações</th>
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
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "projeto/formAlterar/" . $projeto['id_projeto'] . ">Alterar</td>";
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "projeto/excluir/" . $projeto['id_projeto'] . ">Excluir</td>";
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "atividade/atividadesProjeto/" . $projeto['id_projeto'] . ">Atividades</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table><tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>projeto/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL.'home/'.$_SESSION['nome_perfil']?>">Voltar</a></td>
        </tr></table>
</div>