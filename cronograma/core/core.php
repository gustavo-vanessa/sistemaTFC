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
    /**
     * O core tem somente um função a RUN que executa assim que o arquivo é chamado
     */
    public function run() {
        //primeiramente realizamos a busca dos parametros 
        //com o metodo explode separamos todas as opções após a palavra index.php
        $url = explode('index.php', $_SERVER['PHP_SELF']);
        //com o metodo end pegamos a ultimo item do nosso array
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
            $currentController = $url[0] . 'Controller';
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
        
        $funcs  =  array("atividadeController",  
                         "atividadePadraoController", 
                         "ganttController", 
                         "homeController", 
                         "logController", 
                         "loginUsuario", 
                         "observacaoController", 
                         "perfilController",
                         "pmbokController",
                         "projetoController",
                         "subatividadeController",
                         "subatividadePadraoController",
                         "usuariosController",
                         "validacoesController"
            );  
        
           
        
        require_once 'core/controller.php';
        //após termos já definido que iremos executar, fazemos a chamada da função com o nome do controler
        // a função a ser executada e seus possiveis parametros.
        $c = new $currentController();
        if(!in_array($c, $funcs)){
        call_user_func_array(array($c,$currentAction), $params);
        }else{
           header('Location: /cronograma'); 
        }
    }

}
