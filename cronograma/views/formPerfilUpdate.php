<?php

foreach ($perfis as $perfil) {
    echo'<form method="post" action="' . BASE_URL . '/perfil/alterar/' . $perfil['id_perfil'] . '">';
    echo'<div class="div_form">';
    echo '<label class="control-label">Nome do Perfil:</label><br />';
    echo '<input class="form-control" name="nome_perfil" placeholder="Nome do Perfil" disabled type="text" value ="' . $perfil['nome_perfil'] . '"><br />';
    echo '<br />';
    echo '<label class="control-label">Descrição do Perfil:</label><br />';
    echo '<input class="form-control" name="descricao_perfil" placeholder="Descrição Perfil" disabled type="text" value ="' . $perfil['descricao_perfil'] . '"><br />';
    echo '<br />';
    echo '<table><tr>';
    echo '<td><a class="btn btn-padrao btn-shadow btn-rc" href="' . BASE_URL . '/perfil">Voltar</a></td>';
    echo '</tr></table>';
    echo '</div>';
    echo '</form>';
}     
