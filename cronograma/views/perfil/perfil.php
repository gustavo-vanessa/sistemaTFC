
<div class="div_form" id="scroll">
    <label class="titulo">Perfis</label>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>                    
            </tr>
        </thead>
        <tbody>
            <?php
            //session_start();
            foreach ($perfis as $perfil) {
                echo "<tr>";
                echo "<td>" . $perfil['id_perfil'] . "</td>";
                echo "<td>" . $perfil['nome_perfil'] . "</td>";
                echo "<td>" . $perfil['descricao_perfil'] . "</td>";
                echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/perfil/formAlterar/" . $perfil['id_perfil'] . ">Visualizar</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table><tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL.'home/'.$_SESSION['nome_perfil']?>">Voltar</a></td>
        </tr></table>
</div>