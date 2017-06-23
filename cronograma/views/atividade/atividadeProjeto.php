<div class="div_form" id="scroll">
    <div class="div_titulo">
        <label class="titulo2">Atividades e Subatividades</label>
    </div>
    <ul class="table-tree" cellspacing="0">
        <?php
        if ($retornos != 'vazio') {
            if ($retornos['id'] === 0) {
                echo " <div class='success'>";
                echo "<label>" . $retornos['msg'] . "</label>";
                echo"</div>";

                header("refresh: 2;");
            } else {
                echo " <div class='warning'>";
                echo "<label>" . $retornos['msg'] . "</label>";
                echo"</div>";
                header("refresh: 2;");
            }
        }
        $conta = 1;
        foreach ($atividades as $atividade) {
            $conta++;
            ?>
            <li>
                <label class="negrito" for="folder<?php echo $conta; ?>"><?php echo $atividade['nome_atividade']; ?></label>
                <input type="checkbox" id="folder<?php echo $conta; ?>" />
                <ul class="table-wrapper">
                    <?php
                    foreach ($subatividades as $subatividade) {
                        $conta++;

                        if ($atividade['id_atividade'] === $subatividade['id_atividade']) {
                            ?>
                            <li>
                                <label for="folder<?php echo $conta; ?>"><?php echo $subatividade['nome_sub_atividade']; ?></label>
                                <input type="checkbox" id="folder<?php echo $conta; ?>" />
                                <ul class="table-wrapper">
                                    <li class="file">Status: <?php echo $subatividade['status_sub_atividade'] ?></li>
                                    <li class="file">Data inicial: <?php echo $subatividade['data_inicio_sub_atividade']; ?></li>
                                    <li class="file">Data final: <?php echo $subatividade['data_fim_sub_atividade']; ?></li>
                                    <li class="file">Data Validação: <?php echo $subatividade['data_validacao_sub_atividade']; ?></li>
                                    <?php
                                    echo '<li class="file">';
                                    echo '<table class="table th td" >';
                                    echo'<tbody>';
                                    echo '<tr>';
                                    if ($_SESSION['nome_perfil'] === 'Orientando') {

                                        if (!isset($atividade['data_validacao'])) {
                                            echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/formAlterar/" . $subatividade['id_sub_atividade'] . "'>Alterar</a></td>";
                                            echo "<td><a class='btn btn-excluir btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/excluir/" . $subatividade['id_sub_atividade'] . "'>Excluir</a></td>";
                                        } elseif (isset($atividade['data_validacao'])) {
                                            echo "<td><a class='btn btn-atividades btn-shadow btn-rc' href = '" . BASE_URL . "observacao/formAlterar/" . $subatividade['id_sub_atividade'] . "'>Ações</a></td>";
                                        }
                                    } elseif ($_SESSION['nome_perfil'] === 'Orientador') {
                                        // if (!isset($atividade['data_validacao'])) {
                                        echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/formAlterar/" . $subatividade['id_sub_atividade'] . "'>Alterar</a></td>";
                                        echo "<td><a class='btn btn-excluir btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/excluir/" . $subatividade['id_sub_atividade'] . "'>Excluir</a></td>";
                                        //} else
                                        if (isset($atividade['data_validacao'])) {
                                            echo "<td><a class='btn btn-atividades btn-shadow btn-rc' href = '" . BASE_URL . "observacao/formAlterar/" . $subatividade['id_sub_atividade'] . "'>Ações</a></td>";
                                        }
                                    } else {
                                        echo "<td><a class='btn btn-atividades btn-shadow btn-rc' href = '" . BASE_URL . "observacao/formAlterar/" . $subatividade['id_sub_atividade'] . "'>Ações</a></td>";
                                        echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/formAlterar/" . $subatividade['id_sub_atividade'] . "'>Alterar</a></td>";
                                        echo "<td><a class='btn btn-excluir btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/excluir/" . $subatividade['id_sub_atividade'] . "'>Excluir</a></td>";
                                    }
                                    echo '</tr>';
                                    echo'</tbody>';
                                    echo '</table>';
                                    echo '</li>';
                                    ?>

                                </ul>
                            </li>
                            <br />
                            <?php
                        }
                    }
                    ?>
                </ul>
            <li class="file">
                <?php
                if ($_SESSION['nome_perfil'] === 'Orientando') {

                    if (!isset($atividade['data_validacao'])) {
                        echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-incluir' href = '" . BASE_URL . "subatividade/form_add/" . $atividade['id_atividade'] . "'>Incluir subatividade</a></td>";
                        ?>
                        <?php echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . BASE_URL . "atividade/formAlterar/" . $atividade['id_atividade'] . "'>Alterar atividade</a></td>"; ?>
                        <?php echo "<td><a class='btn btn-shadow btn-rc btn-excluir' href = '" . BASE_URL . "atividade/excluir/" . $atividade['id_atividade'] . "'>Excluir atividade</a></td>"; ?>
                    </li>
                    </li>
                    <?php
                }
            } elseif ($_SESSION['nome_perfil'] === 'Orientador') {

                if (isset($atividade['data_validacao'])) {
                    echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/form_add/" . $atividade['id_atividade'] . "'>Incluir subatividade</a></td>";
                }
                echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . BASE_URL . "atividade/formAlterar/" . $atividade['id_atividade'] . "'>Alterar atividade</a></td>";
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-excluir' href = '" . BASE_URL . "atividade/excluir/" . $atividade['id_atividade'] . "'>Excluir atividade</a></td>";
            } else {
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-incluir' href = '" . BASE_URL . "subatividade/form_add/" . $atividade['id_atividade'] . "'>Incluir subatividade</a></td>";
                echo "<td>       </td>";
                echo "<td><a class='btn btn-alterar btn-shadow btn-rc btn-atividade-projeto' href = '" . BASE_URL . "atividade/formAlterar/" . $atividade['id_atividade'] . "'>Alterar atividade</a></td>";
                echo "<td>       </td>";
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-excluir' href = '" . BASE_URL . "atividade/excluir/" . $atividade['id_atividade'] . "'>Excluir atividade</a></td>";
            }
        }
        ?>

    </ul>

    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href='<?php echo BASE_URL . "atividadePadrao/atividadesPadraoProjeto/" . $pmbok[0][0] . "'"; ?>'>Importar Atividades</a></td>
            <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL . 'projeto' ?>">Voltar</a></td>
        </tr></table>
    <br />
</div>
