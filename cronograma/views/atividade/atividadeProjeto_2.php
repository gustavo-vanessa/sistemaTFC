
<label class="titulo">Atividades e Subatividades</label>

<ul class="table-tree" cellspacing="0">
            <li>
                <?php foreach ($atividades as $atividade){?>
                <label for="folder2"><?php echo $atividade['nome_atividade'];?></label>
                <input type="checkbox" id="folder2" />
                <ul class="table-wrapper">
                    <li>
                        <?php foreach ($subatividades as $subatividade){
                           // echo 'Atividade: '.$atividade['id_atividade'] ;
                            //echo 'Subatividade: '.$subatividade['id_atividade'];
                            //exit;
                            if($atividade['id_atividade'] === $subatividade['id_atividade']){?>
                        <label for="folder3"><?php echo $subatividade['nome_sub_atividade'];?></label>
                        <input type="checkbox" id="folder3" />
                        <ul class="table-wrapper">
                            <li class="file">Data inicial: <?php echo $subatividade['status_sub_atividade'];?></li>
                            <li class="file">Data inicial: <?php echo $subatividade['data_inicio_sub_atividade'];?></li>
                            <li class="file">Data final: <?php echo $subatividade['data_fim_sub_atividade'];?></li>
                            <li class="file">Data Validação: <?php echo $subatividade['data_validacao_sub_atividade'];?></li>
                            
                        </ul>
                            <?php }else {
     echo 'não entrei no if';
                            }} ?>
                    </li>
                </ul>
                <?php } ?>
            </li>
        </ul>

<br />
<table>
    <tr>
        <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividadePadrao/atividadesPadraoProjeto">Adicionar Atividades e Subatividades</a></td>
        <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'projeto' ?>">Voltar</a></td>
    </tr></table>
<br />
