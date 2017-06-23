<?php if(!isset($_SESSION))     {         session_start();     }
?>
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
            
            <!-- Menu -->  
            <div class="container">
                <?php
                
                if(!empty($_SESSION))     {
                   if (!empty($_SESSION['nome_perfil'])){?>
                <a class="home" href="<?php echo BASE_URL . 'home/' . $_SESSION['nome_perfil'] ?>">Inicio</a>
                <a class="home" href="<?php echo BASE_URL ?>projeto">Projetos</a>
                <?php if($_SESSION['nome_perfil'] == 'Coordenador'){?>
                <div class="dropdown">
                    <button class="dropbtn" onclick="myFunction()">Cadastros</button>
                    <div class="dropdown-content" id="myDropdown">
                        <a href="<?php echo BASE_URL ?>atividadePadrao">Atividades Padrões</a>
                        <a href="<?php echo BASE_URL ?>log">Logs</a>
                        <a href="<?php echo BASE_URL ?>perfil">Perfis</a>
                        <a href="<?php echo BASE_URL ?>pmbok">PMBOK</a>
                        <a href="<?php echo BASE_URL ?>usuarios">Usuários</a>
                    </div>
                </div>
                <?php }?>
                <a class="sair" href="<?php echo BASE_URL.'home/sair'; ?>">Sair</a>
                <?php }}?>
            </div> 
            
            <!-- Fim Menu -->
        </div>
        <div class="div_conteudo"  id="div_conteudo">
            <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        </div>

    </body>
</html>
