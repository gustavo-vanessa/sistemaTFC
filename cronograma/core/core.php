<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of core
 *
 * @author Gustavo Martins
 */
class Core {

    public function run() {
        
        $requi = array(
"homeController",
"validacoesController",
"ganttController",
"homeController",
"subatividadeController",
"projetoController",
"atividadePadraoController",
"atividadeController",
"observacaoController",
"usuariosController",
"subatividadePadraoController",
"pmbokController",
"perfilController",
"logController",
"projetoController");

        $pattern = array("$", "-", "_", "+", "!", "*", "'", "(", ")", "{", "}", "\"", "^", "~",
            "[", "]", "`", "<", ">", "#", "%", ";", "?", ":", "@", "&", "=");

        $var = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);
        $replacement = '';
        foreach ($pattern as $value) {
            if (strrpos($var, $value) > 0) {
                $var = str_replace($value, $replacement, $var);
            } 
        }
        $url = explode('index.php', $var);
        $url = end($url);

        $params = array();
        //se a variavel url for preenchida sabemos que teremos que fazer um tratativa
        if (!empty($url)) {

            //com o metodo explode separamos novamente nossa opções agora pela opção /
            $url = explode('/', $url);
            // com o função array_shift retiramos a primeira opção do nosso array url
            array_shift($url);
            // pelo esquema implantado temos sempre na primeira opção nosso controler dessa forma atribuimos a variavel
            // o nosso primeiro parametro o controller
             if (!in_array($url[0] . 'Controller', $requi)) {
                    exit;
                } else {
                   $currentController = $url[0] . 'Controller'; 
                }
            
            // depois de buscar  o controller retiramos o mesmo do nosso array novamente com a função array shift
            array_shift($url);
            //testamos novamente se temos mais parametros 
            if (isset($url[0])) {
                // caso sim pelo esquema implantado sabemos q nosso proximo parametro é nossa action
                //  (função a ser executada)
               
                $currentAction = $url[0];
                // depois de armazenar retiramos novamente a primeira opção
                array_shift($url);
            } else {
                // se não temos uma action sabemos que esta opção será a index
                $currentAction = 'index';
            }
            // retirando tudo sobra apenas os parametros que esta função pode ter,
            //  testamos para saber se ainda algum parametro
            if (count($url) > 0) {
                // se sim incluimos estas informações aos parametros
                $params = $url;
            }
        } else {
            //caso não tenhamos parametros será sempre o controller homeController e sempre a função index
            $currentController = 'homeController';
            $currentAction = 'index';
        }





        require_once 'core/controller.php';
        //após termos já definido que iremos executar, fazemos a chamada da função com o nome do controler
        // a função a ser executada e seus possiveis parametros.
         if (!in_array($currentController, $requi)) {
                    exit;
                } else {
        $c = new $currentController();
                call_user_func_array(array($c, $currentAction), $params);}
    }

}
