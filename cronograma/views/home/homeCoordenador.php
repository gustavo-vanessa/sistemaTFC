<div>
</div>
<div class="opcoes">
    <br />
    <br />
    <table  >
        <tbody>
            <?php session_start();
            $_SESSION["nome_perfil"] = 'Coordenador';?>
            <tr>
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>projeto">Projetos</a></td> 
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>atividadePadrao">Atividades Padrões</a></td> 
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>SubatividadePadrao">Subatividades Padrões</a></td> 
            </tr>
            <tr>
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>perfil">Perfis</a></td> 
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>usuarios">Usuários</a></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>pmbok">PMBOK</a></td>
            </tr>
            <tr>
                <td><a class="btn btn-padrao btn-shadow btn-rc btn_menu" href="<?php echo BASE_URL ?>">Sair</a></td>
            </tr>
        </tbody>
    </table>
</div>