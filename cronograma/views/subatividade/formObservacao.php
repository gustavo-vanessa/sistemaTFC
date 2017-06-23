<?php
$string = $subatividades[0]['observacoes_sub_atividade'];
?>
<form method="post" action="<?php echo BASE_URL . "observacao/alterar/" . $subatividades[0]['id_sub_atividade'] ?>">
    <div class="div_form " id="scroll">
        <div class="div_form" id="scroll">
           
        <label class="titulo">Ações</label>
        <div>
            <textarea rows="10" cols="40" class="apre-obs" name="obs_anterior" disabled><?php echo str_replace("<br />", "", $string); ?></textarea><br />
            <br />
        </div>


        <table>
            <tr>
               <!-- <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>-->
                <?php
                if ($_SESSION['nome_perfil'] === 'Orientando') {
                    if (!isset($subatividades[0]['data_validacao_sub_atividade'])) {
                        switch ($subatividades[0]['status_sub_atividade']) {
                            case "E":
                                break;
                            case "EA":
                                break;
                            default :
                                echo "<div>";
                                echo "<label class='control-label'>Insira sua Observação: *</label><br />";
                                echo "<textarea rows='10' cols='40' class='form-obs' name='obs_incluir' required></textarea>";
                                echo " <br />";
                                echo " </div>";
                                //echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/executar/" . $subatividade['id_sub_atividade'] . "'>Executar</a></td>";
                                echo "<td><input type='submit' name='submit' value='Executar' class='btn btn-padrao btn-shadow btn-rc'/></td>";
                        }
                    }
                } elseif ($_SESSION['nome_perfil'] === 'Orientador') {
                    if (!isset($subatividades[0]['data_validacao_sub_atividade'])) {
                        switch ($subatividades[0]['status_sub_atividade']) {
                            case "E":
                                echo "<div>";
                                echo "<label class='control-label'>Insira sua Observação: *</label><br />";
                                echo "<textarea rows='10' cols='40' class='form-obs' name='obs_incluir' required></textarea>";
                                echo " <br />";
                                echo " </div>";
                                echo "<td><input type='submit' name='submit' value='Validar' class='btn btn-validar btn-shadow btn-rc'/></td>";
                                echo "<td><input type='submit' name='submit' value='Recusar' class='btn btn-excluir btn-shadow btn-rc'/></td>";
                                break;
                            case "EA":
                                echo "<div>";
                                echo "<label class='control-label'>Insira sua Observação: *</label><br />";
                                echo "<textarea rows='10' cols='40' class='form-obs' name='obs_incluir' required></textarea>";
                                echo " <br />";
                                echo " </div>";
                                echo "<td><input type='submit' name='submit' value='Validar' class='btn btn-validar btn-shadow btn-rc'/></td>";
                                echo "<td><input type='submit' name='submit' value='Recusar' class='btn btn-excluir btn-shadow btn-rc'/></td>";
                                break;
                            default:
                                echo "<div>";
                                echo "<label class='control-label'>Insira sua Observação: *</label><br />";
                                echo "<textarea rows='10' cols='40' class='form-obs' name='obs_incluir' required></textarea>";
                                echo " <br />";
                                echo " </div>";
                                echo "<td><input type='submit' name='submit' value='Executar' class='btn btn-padrao btn-shadow btn-rc'/></td>";
                                break;
                        }

                        // echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '" . BASE_URL . "subatividade/validar/" . $subatividade['id_sub_atividade'] . "'>Validar</a></td>";
                    }
                } else {
                    echo "<td><input type='submit' name='submit' value='Executar' class='btn btn-padrao btn-shadow btn-rc'/></td>";
                    echo "<td><input type='submit' name='submit' value='Validar' class='btn btn-validar btn-shadow btn-rc'/></td>";
                    echo "<td><input type='submit' name='submit' value='Recusar' class='btn btn-excluir btn-shadow btn-rc'/></td>";
                }
                ?>
                <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL . 'atividade/atividadesProjeto/' . $_SESSION['id_projeto'] ?>">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>