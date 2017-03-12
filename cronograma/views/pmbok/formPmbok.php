<form method="post" action="<?php echo BASE_URL; ?>pmbok/add">
    <div class="div_form" id="scroll">
        <label class="titulo">PMBOK</label>
        <div>
            <label class="control-label">Descrição do PMBOK: *</label><br />
            <input class="form-control" name="descricao_pmbok" required placeholder="Descrição do PMBOK" type="text"><br />
            <br />
            <table><tr>
                    <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                    <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>pmbok">Voltar</a></td>
                </tr></table>
        </div>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form> 