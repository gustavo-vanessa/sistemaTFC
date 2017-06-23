<?php if(!isset($_SESSION))     {         session_start();     }?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of homeController
 *
 * @author Gustavo Martins
 */
class homeController extends controller {

    public function index() {
        $dados = array();
        if(!isset($_SESSION))     {         session_start();     }
        session_destroy();
        $this->loadTemplate('login', $dados);
    }

    public function coordenador() {
        $dados = null;
        if(!isset($_SESSION))     {         session_start();     }
        $_SESSION["nome_perfil"] = 'Coordenador';
        $this->loadTemplate('home/homeCoordenador', $dados);
    }

    public function orientador() {
        $dados = null;
        if(!isset($_SESSION))     {         session_start();     }
        $_SESSION["nome_perfil"] = 'Orientador';
        $this->loadTemplate('home/homeOrientador', $dados);
    }

    public function orientando() {
        $dados = null;
        if(!isset($_SESSION))     {         session_start();     }
        $_SESSION["nome_perfil"] = $dados['nome_perfil'];
        $this->loadTemplate('home/homeOrientando', $dados);
    }

}
