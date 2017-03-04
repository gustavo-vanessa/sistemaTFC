<form method="post" action="<?php echo BASE_URL; ?>validaLogin">
    <div class="div_form ">
        <label class="label" for=Login">Login</label><br>
        <input class="form-control" name="Login" required placeholder="Entre com o login" type="text"><br>
        <label class="label" for="exampleInputPassword1">Senha</label><br>
        <input class="form-control" name="exampleInputPassword1" required placeholder="Senha" type="password"><br>
        <input type="submit" name="submit" value="Login" class="btn btn-padrao btn-shadow btn-rc"/><br><br>
    </div>
</form>