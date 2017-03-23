<div>
    <h1 class="label">Selecione o perfil desejado</h1>
</div>
<div class="opcoes">
    <br />
    <br />
    <table  >
        <tbody>
            <tr>
                <?php 
                 session_start();
                foreach ($usuarios as $usuario) {
                    echo '<td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="'.BASE_URL.'home/'.$usuario['nome_perfil'].'">'.$usuario['nome_perfil'].'</a></td>';
                    $_SESSION["id_usuario"] = $usuario['id_usuario'];
                    $_SESSION["nome_usuario"] = $usuario['nome_usuario'];
                    $_SESSION["nome_perfil"] = $usuario['nome_perfil'];
                }?>
            </tr>
        </tbody>
    </table>
</div>