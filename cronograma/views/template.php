<html>
    
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style_template.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/estilo.css"/>         
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/styles/css/gantti.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/styles/css/screen.css"/>;
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/build/html2canvas.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/jspdf.debug.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/basic.js"></script>
        
        <title>Projeto</title>
    </head>
    <body>
        <div class="div_cabecalho"> 
            <div class="imagem" ></div>      
        </div>
        <div class="div_conteudo"  id="div_conteudo">
            <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        </div>
        <div class="div_rodape"></div>
    </body>
</html>
