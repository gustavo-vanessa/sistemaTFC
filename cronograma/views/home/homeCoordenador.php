<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["nome_perfil"] != 'Coordenador') {
    header("refresh: 0;");
}

$_SESSION["nome_perfil"] = 'Coordenador';
?>

</div>