<?php
foreach ($projetos as $projeto):
    ?>

    <form method="post" action="<?php echo BASE_URL . "projeto/alterar/" . $projeto['id_projeto']; ?>">

        <div class="div_form " id="scroll">
           
            <label class="titulo">Alterar Projeto</label>
            <div>
                <label class="control-label">Nome do Projeto: *</label><br />
                <input class="form-control" required value="<?php echo $projeto['nome_projeto']; ?>" name="nome_projeto" placeholder="Nome da Atividade" type="text"><br />
                <br />
            </div>    
            <div>
                <label class="control-label">Status do Projeto: *</label><br />
                <select  class="form-control" required name="status_projeto">
                    <?php
                    switch ($projeto['status_projeto']) {
                        case 'AP':
                            echo " <option value='AP' selected>Aprovado TFC I</option>";
                            echo "<option value='A'>Atrasado</option>";
                            echo "<option value='EP'>Em Progresso</option>";
                            echo " <option value='F'>Finalizado</option>";
                            echo "<option value='IN'>Iniciado</option>";
                            break;
                        case 'A':
                            echo " <option value='AP'>Aprovado TFC I</option>";
                            echo "<option value='A' selected>Atrasado</option>";
                            echo "<option value='EP'>Em Progresso</option>";
                            echo " <option value='F'>Finalizado</option>";
                            echo "<option value='IN'>Iniciado</option>";
                            break;
                        case 'EP':
                            echo " <option value='AP'>Aprovado TFC I</option>";
                            echo "<option value='A'>Atrasado</option>";
                            echo "<option value='EP' selected>Em Progresso</option>";
                            echo " <option value='F'>Finalizado</option>";
                            echo "<option value='IN'>Iniciado</option>";
                            break;
                        case 'F':
                            echo " <option value='AP'>Aprovado TFC I</option>";
                            echo "<option value='A'>Atrasado</option>";
                            echo "<option value='EP'>Em Progresso</option>";
                            echo " <option value='F' selected>Finalizado</option>";
                            echo "<option value='IN'>Iniciado</option>";
                            break;
                        case 'IN':
                            echo " <option value='AP'>Aprovado TFC I</option>";
                            echo "<option value='A'>Atrasado</option>";
                            echo "<option value='EP'>Em Progresso</option>";
                            echo " <option value='F'>Finalizado</option>";
                            echo "<option value='IN' selected>Iniciado</option>";
                            break;
                        default :
                            echo " <option value='AP'>Aprovado TFC I</option>";
                            echo "<option value='A'>Atrasado</option>";
                            echo "<option value='EP'>Em Progresso</option>";
                            echo " <option value='F'>Finalizado</option>";
                            echo "<option value='IN'>Iniciado</option>";
                            break;
                    }
                    ?>
                </select>
                <br />
                <br />
            </div> 
            <div>
                <label class="control-label">Orientador: *</label><br />
                <select  class="form-control" required name="id_orientador">

                    <?php foreach ($orientadores as $orientador): ?>
                        <?php
                        if ($orientador['id_usuario'] == $projeto['id_orientador']) {
                            echo "<option value='" . $orientador['id_usuario'] . "' selected>" . $orientador['nome_usuario'] . "</option>";
                        }
                        echo "<option value='" . $orientador['id_usuario'] . "'>" . $orientador['nome_usuario'] . "</option>";
                        ?>
                    <?php endforeach; ?>
                </select>
                <br />
                <br />
            </div> 
            <div>
                <label class="control-label">Orientando: *</label><br />
                <select  class="form-control" required name="id_orientando">
                    <?php foreach ($orientandos as $orientando): ?>
                        <?php
                        if ($orientando['id_usuario'] == $projeto['id_orientando']) {
                            echo "<option value='" . $orientando['id_usuario'] . "'selected >" . $orientando['nome_usuario'] . "</option>";
                        }
                        echo "<option value='" . $orientando['id_usuario'] . "'>" . $orientando['nome_usuario'] . "</option>";
                        ?>
    <?php endforeach; ?>
                </select>
                <br />
                <br />
            </div>      
<?php endforeach; ?>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL ?>projeto">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>