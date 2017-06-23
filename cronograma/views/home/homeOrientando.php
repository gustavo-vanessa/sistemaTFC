<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION["nome_perfil"] != 'Orientando') {
    header("refresh: 0;");
}
?>

</div>