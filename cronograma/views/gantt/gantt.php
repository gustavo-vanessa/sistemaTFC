
<div style="width: 100%; height: 100%" id="scroll">
    <div class="div_menu" style="margin-left: 5%;">
        <a class="div_menu_a" href="<?php echo BASE_URL . 'home/' . $_SESSION['nome_perfil'] ?>">Inicio</a>
        <a class="div_menu_a" href="<?php echo BASE_URL . 'projeto' ?>">/ Projetos</a>
        <a class="div_menu_a" href="#">/ Gráfico de Gantt</a>
    </div>
    <?php echo "<label class='tituloGantt'>$projeto</label>";
        echo $gantt; ?>
    <br />

<table id="el">
    <tr>
        <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo BASE_URL . 'projeto' ?>">Voltar</a></td>
        <td><a class="btn btn-relatorio btn-shadow btn-rc" href="javascript:genPDF()" target="_blank">Relatório</a></td>
    </tr></table>
<br />
    
</div>
