
<div class="div_form" id="scroll">
    
   <label class="titulo">Usuários</label>
   
            <table class="table th td" >
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th id="el">Ações</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($usuarios as $usuario) {
                        echo "<tr>";
                        echo "<td>" . $usuario['id_usuario'] . "</td>";
                        echo "<td>" . $usuario['nome_usuario'] . "</td>";
                        echo "<td>" . $usuario['login_usuario'] . "</td>";
                        echo "<td>" . $usuario['email_usuario'] . "</td>";
                        echo "<td ><a class = 'btn btn-alterar btn-shadow btn-rc' href = " . BASE_URL . "usuarios/formAlterar/" . $usuario['id_usuario'] . ">Alterar</td>";
                        echo "<td></td> ";
                        echo "<td></td> ";
                        echo "<td></td> ";
                        echo "<td><a class = 'btn btn-excluir btn-shadow btn-rc' href = " . BASE_URL . "usuarios/excluir/" . $usuario['id_usuario'] . ">Excluir</td>";
                        echo "</tr> ";
                    }
                    ?>
                </tbody>
            </table>
            <br />
            <table id="el">
                <tr>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>usuarios/form_add">Adicionar</a></td>
                    <td><a class="btn btn-relatorio btn-shadow btn-rc" href="javascript:genPDF()" target="_blank">Relatório</a></td>
                    <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL.'home/'.$_SESSION['nome_perfil']?>">Voltar</a></td>
                </tr></table>
        </div>
