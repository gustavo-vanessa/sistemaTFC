
<div class="div_form" id="scroll">
    
    <label class="titulo">Perfis</label>
    <table class="table th td" >
        <thead>
            <tr>
                <th>Cód</th>
                <th>Nome</th>
                <th>Descrição</th>                  
            </tr>
        </thead>
        <tbody>
            <?php
             if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
            foreach ($perfis as $perfil) {
                echo "<tr>";
                echo "<td>" . $perfil['id_perfil'] . "</td>";
                echo "<td>" . $perfil['nome_perfil'] . "</td>";
                echo "<td>" . $perfil['descricao_perfil'] . "</td>";
                echo "</tr> ";
            }
            ?>
        </tbody>
    </table>
    <br />
    <table id="el"><tr>
            <td><a  class="btn btn-relatorio btn-shadow btn-rc" href="javascript:genPDF()" target="_blank">Relatório</a></td>
            <td><a  class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL . 'home/' . $_SESSION['nome_perfil'] ?>">Voltar</a></td>
        </tr></table>
</div>