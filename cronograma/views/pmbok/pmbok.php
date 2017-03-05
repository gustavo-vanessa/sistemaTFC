 <div class="div_form">
    <label class="titulo">PMBOK</label>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Descrição</th>
                <th>Ações</th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pmboks as $pmbok) {
                echo "<tr>";
                echo "<td>" . $pmbok['id_pmbok_versao'] . "</td>";
                echo "<td>" . $pmbok['descricao_pmbok_versao'] . "</td>";
                echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/pmbok/formAlterar/" . $pmbok['id_pmbok_versao'] . ">Alterar</td>";
                echo "<td><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/pmbok/excluir/" . $pmbok['id_pmbok_versao'] . ">Excluir</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <br />
    <br />
    <table><tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>/pmbok/form_add">Adicionar</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
        </tr></table>
</div>