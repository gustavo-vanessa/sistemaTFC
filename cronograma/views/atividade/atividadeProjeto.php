<div class="div_form" id="scroll">
    <div class="div_titulo">
        <label class="titulo2">Atividades e Subatividades</label>
    </div>
    <ul class="table-tree" cellspacing="0">
        <?php

        if ($retornos != 'vazio') {
            if ($retornos['id'] === 0) { 
                $test = htmlspecialchars(" <div class='success'>");
                
                echo $test;

                echo "<label>" . htmlentities($retornos['msg'], ENT_QUOTES, "utf-8") . "</label>";
                echo"</div>";

                header("refresh: 2;");
            } else {
                echo " <div class='warning'>";
                echo "<label>" . htmlentities($retornos['msg'], ENT_QUOTES, "utf-8") . "</label>";
                echo"</div>";
                header("refresh: 2;");
            }
        }
        $conta = 1;

        foreach ($atividades as $atividade) {
            $id_atividade = $atividade['id_atividade'];
            $nome_atividade = $atividade['nome_atividade'];
            $conta++;
            ?>
            <li>
                <label class="negrito" for="folder<?php print htmlentities($conta, ENT_QUOTES, "utf-8"); ?>"><?php print htmlentities($nome_atividade, ENT_QUOTES, "utf-8"); ?></label>
                <input type="checkbox" id="folder<?php echo htmlentities($conta, ENT_QUOTES, "utf-8"); ?>" />
                <ul class="table-wrapper">
                    <?php
                    foreach ($subatividades as $subatividade) {

                        $conta++;

                        if ($atividade['id_atividade'] === $subatividade['id_atividade']) {
                            ?>
                            <li>
                                <?php
                                echo '<label for="folder';
                                echo $conta;
                                echo '">';
                                print_r($subatividade['nome_sub_atividade']);
                                echo '</label>';
                                ?>
                                <input type="checkbox" id="folder<?php echo htmlentities($conta, ENT_QUOTES, "utf-8"); ?>" />
                                <ul class="table-wrapper">
                                    <li class="file">Status: <?php echo htmlentities($subatividade['status_sub_atividade'], ENT_QUOTES, "utf-8") ?></li>
                                    <li class="file">Data inicial: <?php echo htmlentities($subatividade['data_inicio_sub_atividade'], ENT_QUOTES, "utf-8"); ?></li>
                                    <li class="file">Data final: <?php echo htmlentities($subatividade['data_fim_sub_atividade'], ENT_QUOTES, "utf-8"); ?></li>
                                    <li class="file">Data Validação: <?php echo htmlentities($subatividade['data_validacao_sub_atividade'], ENT_QUOTES, "utf-8"); ?></li>
                                    <?php
                                    echo '<li class="file">';
                                    echo '<table class="table th td" >';
                                    echo'<tbody>';
                                    echo '<tr>';
                                    if ($_SESSION['nome_perfil'] === 'Orientando') {

                                        if (!isset($atividade['data_validacao'])) {
                                            echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "subatividade/formAlterar/" . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Alterar</a></td>";
                                            echo "<td><a class='btn btn-excluir btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "subatividade/excluir/" . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Excluir</a></td>";
                                        } elseif (isset($atividade['data_validacao'])) {
                                            echo "<td><a class='btn btn-atividades btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "observacao/formAlterar/" . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Ações</a></td>";
                                        }
                                    } elseif ($_SESSION['nome_perfil'] === 'Orientador') {
                                        // if (!isset($atividade['data_validacao'])) {
                                        echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "subatividade/formAlterar/" . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Alterar</a></td>";
                                        echo "<td><a class='btn btn-excluir btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "subatividade/excluir/" . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Excluir</a></td>";
                                        //} else
                                        if (isset($atividade['data_validacao'])) {
                                            echo "<td><a class='btn btn-atividades btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "observacao/formAlterar/" . $subatividade['id_sub_atividade'] . "'>Ações</a></td>";
                                        }
                                    } else {
                                        echo "<td><a class='btn btn-atividades btn-shadow btn-rc' href = '" . htmlentities(BASE_URL . "observacao/formAlterar/", ENT_QUOTES, "utf-8") . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Ações</a></td>";
                                        echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . htmlentities(BASE_URL . "subatividade/formAlterar/", ENT_QUOTES, "utf-8") . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Alterar</a></td>";
                                        echo "<td><a class='btn btn-excluir btn-shadow btn-rc' href = '" . htmlentities(BASE_URL . "subatividade/excluir/", ENT_QUOTES, "utf-8") . htmlentities($subatividade['id_sub_atividade'], ENT_QUOTES, "utf-8") . "'>Excluir</a></td>";
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
                        echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-incluir' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "subatividade/form_add/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Incluir subatividade</a></td>";
                        ?>
                        <?php echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividade/formAlterar/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Alterar atividade</a></td>"; ?>
                        <?php echo "<td><a class='btn btn-shadow btn-rc btn-excluir' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividade/excluir/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Excluir atividade</a></td>"; ?>
                    </li>
                    </li>
                    <?php
                }
            } elseif ($_SESSION['nome_perfil'] === 'Orientador') {

                if (isset($atividade['data_validacao'])) {
                    echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "subatividade/form_add/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Incluir subatividade</a></td>";
                }
                echo "<td><a class='btn btn-alterar btn-shadow btn-rc' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividade/formAlterar/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Alterar atividade</a></td>";
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-excluir' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividade/excluir/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Excluir atividade</a></td>";
            } else {
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-incluir' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "subatividade/form_add/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Incluir subatividade</a></td>";
                echo "<td>       </td>";
                echo "<td><a class='btn btn-alterar btn-shadow btn-rc btn-atividade-projeto' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividade/formAlterar/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Alterar atividade</a></td>";
                echo "<td>       </td>";
                echo "<td><a class='btn btn-padrao btn-shadow btn-rc btn-excluir' href = '" . htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividade/excluir/" . htmlentities($atividade['id_atividade'], ENT_QUOTES, "utf-8") . "'>Excluir atividade</a></td>";
            }
        }
        ?>

    </ul>

    <br />
    <table>
        <tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href='<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . "atividadePadrao/atividadesPadraoProjeto/" . htmlentities($pmbok[0][0], ENT_QUOTES, "utf-8") . "'"; ?>'>Importar Atividades</a></td>
            <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . 'projeto' ?>">Voltar</a></td>
        </tr></table>
    <br />
</div>
