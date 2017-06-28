<form method="post" action="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8"); ?>perfil/add">
    <div class="div_form">
        
        <label class="control-label">Nome do Perfil:</label><br />
        <input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" type="text"><br />
        <br />
        <label class="control-label">Descrição do Perfil:</label><br />
        <input class="form-control" name="descricao_perfil" placeholder="Descrição do Perfil    " type="text"><br />
        <br />
        <table><tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") ?>perfil">Voltar</a></td>
            </tr></table>
    </div>
</form>