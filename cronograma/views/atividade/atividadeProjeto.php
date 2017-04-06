  <div class="div_form" id="scroll">
<label class="titulo">Atividades e Subatividades</label>

<ul class="table-tree" cellspacing="0">
    <?php
    $conta = 1;
    foreach ($atividades as $atividade) {
        $conta++;
        ?>
        <li>
            <label for="folder<?php echo $conta; ?>"><?php echo $atividade['nome_atividade']; ?></label>
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
                                <li class="file">Status: <?php echo $subatividade['status_sub_atividade']; ?></li>
                                <li class="file">Data inicial: <?php echo $subatividade['data_inicio_sub_atividade']; ?></li>
                                <li class="file">Data final: <?php echo $subatividade['data_fim_sub_atividade']; ?></li>
                                <li class="file">Data Validação: <?php echo $subatividade['data_validacao_sub_atividade']; ?></li>
                           <?php     
                            echo '<li class="file">';
                                echo '<table class="table th td" >';
                                    echo'<tbody>';
                                        echo '<tr>';
                                         if(!isset($atividade['data_validacao_atividade'])||$_SESSION['nome_perfil'] != 'Orientando'){
                                            echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."atividade/alterar/".$atividade['id_atividade']."'>Alterar</a></td>";
                                            echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."atividade/excluir/".$atividade['id_atividade']."'>Excluir</a></td>";
                                             }
                                            echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."subatividade/executar/".$subatividade['id_sub_atividade']."'>Executar</a></td>";
                                            if ($_SESSION['nome_perfil'] != 'Orientando') {
                                                echo "<td><a class='btn btn-padrao btn-shadow btn-rc' href = '".BASE_URL."subatividade/validar/".$subatividade['id_sub_atividade']."'>Validar</a></td>";
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
        </li>
    <?php } ?>

</ul>

<br />
<table>
    <tr>
        <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividadePadrao/atividadesPadraoProjeto">Adicionar Atividades e Subatividades</a></td>
        <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'projeto' ?>">Voltar</a></td>
    </tr></table>
<br />
  </div>
