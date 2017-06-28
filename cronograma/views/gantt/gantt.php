
<div style="width: 100%; height: 100%" id="scroll">
    
    <?php echo "<label class='tituloGantt'>". htmlentities($projeto, ENT_QUOTES, "utf-8")."</label>";
        echo $gantt; ?>
    <br />

<table id="el">
    <tr>
        <td><a class="btn btn-voltar btn-shadow btn-rc" href="<?php echo htmlentities(BASE_URL, ENT_QUOTES, "utf-8") . 'projeto' ?>">Voltar</a></td>
        <td><a class="btn btn-relatorio btn-shadow btn-rc" href="javascript:genPDF()" target="_blank">Relatório</a></td>
    </tr></table>
<br />
    
</div>
