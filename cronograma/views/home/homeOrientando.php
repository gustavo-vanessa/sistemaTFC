<div>
    <h1 class="label">Eba estou no perfil de Orientando \o/</h1>
</div>
<div class="opcoes">
    <br />
    <br />
    <table  >
        <tbody>
            <tr>

                <?php session_start();
                $_SESSION["nome_perfil"] = 'Orientando';
                ?>
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>projeto">Projetos</a></td> 
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>">Sair</a></td>
            </tr>
        </tbody>
    </table>
</div>