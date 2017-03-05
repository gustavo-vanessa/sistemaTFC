<?php

foreach ($usuarios as $usuario) {
    echo'<form method="post" action="' . BASE_URL . '/usuarios/alterar/' . $usuario['id_usuario'] . '">';
    echo'<div class="div_form">';
    echo '<label class="titulo">Usuários</label>';
    echo '<div>';
    echo'<label class="control-label">Nome: *</label><br />';
    echo'<input class="form-control" name="nome_usuario" required placeholder="Nome" type="text" value="' . $usuario['nome_usuario'] . '"><br /><br />';
    echo'<label class="control-label">Login: *</label><br />';
    echo'<input class="form-control" name="login_usuario" required placeholder="Enter Login" type="text" value="' . $usuario['login_usuario'] . '"><br /><br />';
    echo'<label class="control-label" for="exampleInputPassword1">Senha: *</label><br />';
    echo'<input class="form-control" name="Password_usuario" required placeholder="Senha" type="password" value="' . $usuario['senha_usuario'] . '"><br /><br />';
    echo'<label class="control-label" for="exampleInputEmail1">E-mail: *</label><br />';
    echo'<input class="form-control" name="Email_usuario" required placeholder="Enter e-mail" type="email" value="' . $usuario['email_usuario'] . '">';
    echo '<table><tr>';
    echo'<td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>';
    echo'<td><a class="btn btn-padrao btn-shadow btn-rc" href="' . BASE_URL . '/usuarios">Voltar</a></td><br />';
    echo '</tr></table>';
    echo'<br />';
    echo'</div>';
    echo '<label class="textorodape">* Campo Obrigatório</label>';
    echo'</div>';
    echo'</form>';
}