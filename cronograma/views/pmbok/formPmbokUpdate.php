<?php

foreach ($pmboks as $pmbok) {
    echo'<form method="post" action="' . BASE_URL . '/pmbok/alterar/' . $pmbok['id_pmbok_versao'] . '">';
    echo'<div class="div_form" id="scroll">';
    echo '<label class="titulo">PMBOK</label>';
    echo '<div>';
    echo'<label class="control-label">Descrição do PMBOK: *</label><br />';
    echo'<input class="form-control" required value="' . $pmbok['descricao_pmbok_versao'] . '" name="descricao_pmbok" placeholder="Descrição do PMBOK" type="text"><br />';
    echo'<br />';
    echo '<table><tr>';
    echo'<td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>';
    echo'<td><a class="btn btn-padrao btn-shadow btn-rc" href="' . BASE_URL . '/pmbok">Voltar</a></td>';
    echo '</tr></table>';
    echo'</div>';
    echo '<label class="textorodape">* Campo Obrigatório</label>';
    echo'</div>';
    echo'</form> ';
}
       