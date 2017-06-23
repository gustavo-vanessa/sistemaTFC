<form method="post" action="<?php echo BASE_URL; ?>usuarios/add">
    <div class="div_form" id="scroll">
        
        <label class="titulo">Incluir Usuários</label>
        <div>
            <label class="control-label">Nome: *</label><br />
            <input class="form-control" name="nome_usuario" required  placeholder="Nome" type="text"><br />
            <br />

            <label class="control-label">Login: *</label><br />
            <input class="form-control" name="login_usuario" required placeholder="Enter Login" type="text"><br />
            <br />

            <label class="control-label" for="exampleInputPassword1">Senha: *</label><br />
            <input class="form-control" name="Password_usuario" required placeholder="Senha" type="password"><br />
            <br />

            <label class="control-label" for="exampleInputEmail1">E-mail: *</label><br />
            <input class="form-control" name="Email_usuario" required placeholder="Enter e-mail" type="email"><br />
            <br />
            <label class="control-label" for="exampleInputEmail1">Perfis: *</label><br /><br /><br />

            <?php
            foreach ($perfis as $perfil) {
                echo $perfil['nome_perfil'];
                echo "<input class='form-control' name='" . $perfil['nome_perfil'] . "' type='checkbox'>";
                echo"<br /><br />";
            }
            ?>

            <table><tr>
                    <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                    <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL ?>usuarios">Voltar</a></td>
                </tr></table>
        </div>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>