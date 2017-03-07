
<div class="div_form" id="scroll">
    <label class="titulo">Logs</label>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Data</th>
                <th>Valor anterior</th>
                <th>Valor atual</th>                    
                <th>Usuário</th>                    
                <th>Comando executado</th>  
                <th>Tabela</th>                    
                <th>Mensagem</th>                                        
            </tr>
        </thead>
        <tbody>
            <?php
               foreach ($logs as $log) {
                echo "<tr>";
                echo "<td>" . $log['id_log'] . "</td>";
                echo "<td>" . $log['data_log'] . "</td>";
                echo "<td>" . $log['valor_anterior_log'] . "</td>";
                echo "<td>" . $log['valor_atual_log'] . "</td>";
                echo "<td>" . $log['nome_usuario'] . "</td>";
                echo "<td>" . $log['comando_realizado_log'] . "</td>";
                echo "<td>" . $log['tabela_alteracao_log'] . "</td>";
                echo "<td>" . $log['erro_log'] . "</td>";
                echo "<td ><a class = 'btn btn-padrao btn-shadow btn-rc' href = " . BASE_URL . "/log/formAlterar/" . $log['id_log'] . ">Visualizar</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table><tr>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL ?>/validaLogin">Voltar</a></td>
        </tr></table>
</div>