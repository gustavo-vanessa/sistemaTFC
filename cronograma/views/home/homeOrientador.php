<?php if (!isset($_SESSION)) {
    session_start();
} 
if ($_SESSION["nome_perfil"] != 'Orientador') {
    header("refresh: 0;");
}

$_SESSION["nome_perfil"] = 'Orientador';
?>

</div>