<?php

foreach ($logs as $log) {
    echo'<form method="post" action="' . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . 'perfil/alterar/' . htmlentities($log['id_log'], ENT_QUOTES, "utf-8") . '">';
    echo'<div class="div_form" id="scroll">';
    echo '<label class="titulo">Log</label>';
    echo '<div>';
    echo '<label class="control-label">Data do log:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . htmlentities($log['data_log'], ENT_QUOTES, "utf-8") . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Valor anterior:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . htmlentities($log['valor_anterior_log'], ENT_QUOTES, "utf-8") . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Valor atual:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . htmlentities($log['valor_atual_log'], ENT_QUOTES, "utf-8") . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Nome do Usuario:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . htmlentities($log['nome_usuario'], ENT_QUOTES, "utf-8") . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Comando Realizado:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . htmlentities($log['comando_realizado_log'], ENT_QUOTES, "utf-8") . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Tabela:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . htmlentities($log['tabela_alteracao_log'], ENT_QUOTES, "utf-8") . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Mensagem:</label><br />';
    echo '<input class="form-control" name="descricao_perfil" placeholder="Descrição Perfil" disabled type="text" value ="' . htmlentities($log['erro_log'], ENT_QUOTES, "utf-8") . '"><br />';
    echo '<br />';
    echo '<table><tr>';
    echo '<td><a class="btn btn-padrao btn-shadow btn-rc" href="' . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . 'log">Voltar</a></td>';
    echo '</tr></table>';
    echo '</div>';
    echo '</div>';
    echo '</form>';
}     
