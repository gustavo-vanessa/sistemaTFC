<form method="post" action="<?php echo BASE_URL; ?>projeto/add">
    <div class="div_form" id="scroll">
        
        <label class="titulo">Incluir Projeto</label>
        <div>
            <label class="control-label">Nome do Projeto: *</label><br />
            <input class="form-control" name="nome_projeto" required placeholder="Nome do Projeto" type="text"><br />
            <br />
        </div>    
        <div>
            <label class="control-label">Status do Projeto: *</label><br />
            <select  class="form-control" required name="status_projeto">
                <option value="IN" selected="">Iniciado</option>
            </select>
            <br />
            <br />
        </div> 
        <div>
            <label class="control-label">Orientador: *</label><br />
            <select  class="form-control" required name="id_orientador">
                <option>Selecione</option>    
                <?php foreach ($orientadores as $orientador): ?>
                    <?php echo "<option value=" . $orientador['id_usuario'] . " >" . $orientador['nome_usuario'] . "</option>"; ?>
                <?php endforeach; ?>
            </select>
            <br />
            <br />
        </div> 
        <div>

            <label class="control-label">Orientando: *</label><br />
            <select  class="form-control" required name="id_orientando">   
                <?php
                if ($_SESSION['nome_perfil'] != 'Orientando') {
                    foreach ($orientandos as $orientando):
                        echo "<option value=" . $orientando['id_usuario'] . " >" . $orientando['nome_usuario'] . "</option>";
                    endforeach;
                }
                else {
                    echo "<option value=" . $_SESSION['id_usuario'] . " selected>" . $_SESSION['nome_usuario'] . "</option>";
                }
                ?>
            </select>
            <br />
            <br />
        </div> 
        <div>
            <label class="control-label">Versão do PMBOK: *</label><br />
            <select  class="form-control" required name="id_pmbok_versao">
                <option>Selecione</option>    
                <?php foreach ($pmboks as $pmbok): ?>
                    <?php echo "<option value=" . $pmbok['id_pmbok_versao'] . " >" . $pmbok['descricao_pmbok_versao'] . "</option>"; ?>
                <?php endforeach; ?>
            </select>
            <br />
            <br />
        </div> 
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL ?>projeto">Voltar</a></td>
            </tr>
        </table>
        <label class="textorodape">* Campo Obrigatório</label>
    </div>
</form>