<?php


 $funcs  =  array("atividade",  
                         "atividadePadrao", 
                         "gantt", 
                         "home", 
                         "log", 
                         "loginUsuario", 
                         "observacao", 
                         "perfil",
                         "pmbok",
                         "projeto",
                         "subatividade",
                         "subatividadePadrao",
                         "usuarios",
                         "validacoes"
            ); 

 $requi = array(
"views/usuario/formUsuarioUpdate.php",
"views/pmbok/formPmbokUpdate.php",
"views/subatividadePadrao/subatividadePadrao.php",
"views/subatividadePadrao/formSubatividadePadraoUpdate.php",
"views/subatividadePadrao/formSubatividadePadrao.php",
"views/subatividade/subatividade.php",
"views/perfil/formPerfilUpdate.php",
"views/perfil/formPerfil.php",
"views/usuario/usuario.php",
"views/usuario/formUsuario.php",
"views/subatividade/formSubatividadeUpdate.php",
"views/subatividade/formSubatividade.php",
"views/subatividade/formObservacao.php",
"views/projeto/projeto.php",
"views/projeto/formProjetoUpdate.php",
"views/projeto/formProjeto.php",
"views/pmbok/pmbok.php",
"views/pmbok/formPmbok.php",
"views/perfil/perfil.php",
"views/log/log.php",
"views/log/formlog.php",
"views/home/homeControlador.php",
"views/gantt/gantt.php",
"views/atividadePadrao/formAtividadePadraoUpdate.php",
"views/atividadePadrao/formAtividadePadrao.php",
"views/atividadePadrao/atividadePadraoProjeto.php",
"views/atividadePadrao/atividadePadrao.php",
"views/home/homeOrientando.php",
"views/home/homeCoordenador.php",
"views/home/homeOrientador.php",
"views/template.php",
"views/loginErro.php",
"views/login.php",
"views/log/formlogUpdate.php",
"views/atividade/atividadeProjeto.php",
"views/atividade/atividade.php",
"views/atividade/formAtividadeUpdate.php",
"views/atividade/formAtividade.php",
"controllers/homeController.php",
"controllers/validacoesController.php",
"controllers/ganttController.php",
"controllers/homeController.php",
"controllers/subatividadeController.php",
"controllers/projetoController.php",
"controllers/atividadePadraoController.php",
"controllers/atividadeController.php",
"controllers/observacaoController.php",
"controllers/usuariosController.php",
"controllers/subatividadePadraoController.php",
"controllers/pmbokController.php",
"controllers/perfilController.php",
"controllers/logController.php",
"controllers/projetoController.php",
"core/controller.php",
"core/model.php",
"core/core.php",
"models/pmbok.php",
"models/subatividade.php",
"models/projeto.php",
"models/atividade.php",
"models/subatividadePadrao.php",
"models/login.php",
"models/usuario.php",
"models/perfilUsuario.php",
"models/log.php",
"models/atividadePadrao.php",
"models/perfil.php",
"libgantti/lib/gantti.php",
"libgantti/lib/calendar.php",
"index.php",
"environment.php",
     "config.php");

 
if (!in_array('config.php', $requi)) {
    
    exit;
}

require 'config.php';
spl_autoload_register(function ($class){
    if(strpos($class, 'Controller') > -1) {
        if(file_exists('controllers/'.$class.'.php')) {
                require_once 'controllers/'.$class.'.php';
        }
    } elseif(file_exists('models/'.$class.'.php')) {
            require_once 'models/'.$class.'.php';
    } elseif(file_exists('core/'.$class.'.php')) {
            require_once 'core/'.$class.'.php';
    }
});


$core = new Core();
$core->run();

?>
