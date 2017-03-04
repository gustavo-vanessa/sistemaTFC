<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style_template.css"/>
        <title>Projeto</title>
    </head>
    <body>
        <div class="div_cabecalho"> 
            <div class="imagem" ></div>      
        </div>
        <div class="div_conteudo">
            <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        </div>
        <div class="div_rodape"></div>
    </body>
</html>
