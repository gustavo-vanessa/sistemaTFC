<?php

foreach ($logs as $log) {
    echo'<form method="post" action="' . BASE_URL . 'perfil/alterar/' . $log['id_log'] . '">';
    echo'<div class="div_form" id="scroll">';
    echo '<label class="titulo">Log</label>';
    echo '<div>';
    echo '<label class="control-label">Data do log:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . $log['data_log'] . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Valor anterior:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . $log['valor_anterior_log'] . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Valor atual:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . $log['valor_atual_log'] . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Nome do Usuario:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . $log['nome_usuario'] . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Comando Realizado:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . $log['comando_realizado_log'] . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Tabela:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . $log['tabela_alteracao_log'] . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Mensagem:</label><br />';
    echo '<input class="form-control" name="descricao_perfil" placeholder="Descrição Perfil" disabled type="text" value ="' . $log['erro_log'] . '"><br />';
    echo '<br />';
    echo '<table><tr>';
    echo '<td><a class="btn btn-padrao btn-shadow btn-rc" href="' . BASE_URL . 'log">Voltar</a></td>';
    echo '</tr></table>';
    echo '</div>';
    echo '</div>';
    echo '</form>';
}     
