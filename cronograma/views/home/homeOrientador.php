<div>
</div>
<div class="opcoes">
    <br />
    <br />
    <table  >
        <tbody>
            <?php 
            session_start();
            $_SESSION["nome_perfil"] = 'Orientador';
            ?>
            <tr>
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>projeto">Projetos</a></td> 
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>">Sair</a></td>
            </tr>
        </tbody>
    </table>
</div>