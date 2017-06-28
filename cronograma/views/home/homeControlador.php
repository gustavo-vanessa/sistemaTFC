<?php if(!isset($_SESSION))     {         session_start();     }
?>
<div>
    
</div>
<div class="opcoes">
    <br />
    <br />
    <table  >
        <tbody>
            <tr>
                <?php 
             foreach ($usuarios as $usuario) {
                    echo '<td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="'.htmlentities(BASE_URL, ENT_QUOTES, "utf-8").'home/'.$usuario['nome_perfil'].'">'.$usuario['nome_perfil'];
                    $_SESSION["id_usuario"] = $usuario['id_usuario'];
                    $_SESSION["nome_usuario"] = $usuario['nome_usuario'];
                    
                    echo '</a></td>';
                }
                ?>
            </tr>
        </tbody>
    </table>
</div>