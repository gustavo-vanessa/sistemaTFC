<form method="post" action="<?php echo BASE_URL; ?>validacoes">
    <div class="div_form ">
        <br>
        <label class="label" for="mensaagem"><?php $mensagem; echo $mensagem;?></label><br>
        <label class="label" for=Login">Login</label><br>
        <input class="form-control" name="Login" required placeholder="Entre com o login" type="text"><br>
        <label class="label" for="exampleInputPassword1">Senha</label><br>
        <input class="form-control" name="Password" required placeholder="Senha" type="password"><br>
        <input type="submit" name="submit" value="Login" class="btn btn-padrao btn-shadow btn-rc"/><br><br>
    </div>
</form>