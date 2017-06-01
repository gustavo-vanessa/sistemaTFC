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
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        $this->loadTemplate('login', $dados);
    }

    public function coordenador($dados = array()) {
       
        if (!isset($_SESSION)) {
            session_start();
        }
        if(count($dados) > 0){
        $_SESSION["nome_perfil"] = 'Coordenador';
        $_SESSION['nome_usuario'] = $dados['nome_usuario'];
        $_SESSION['id_usuario'] = $dados['id_usuario'];
        }
        $this->loadTemplate('home/homeCoordenador', $dados);
    }

    public function orientador($dados = array()) {

        if (!isset($_SESSION)) {
            session_start();
        }
        if(count($dados) > 0){
        $_SESSION["nome_perfil"] = 'Orientador';
        $_SESSION['nome_usuario'] = $dados['nome_usuario'];
        $_SESSION['id_usuario'] = $dados['id_usuario'];
        
        }
        $this->loadTemplate('home/homeOrientador', $dados);
    }

    public function orientando($dados = array()) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if(count($dados) > 0){
        $_SESSION["nome_perfil"] = 'Orientando';
        $_SESSION['nome_usuario'] = $dados['nome_usuario'];
        $_SESSION['id_usuario'] = $dados['id_usuario'];
        
        }
        $this->loadTemplate('home/homeOrientando', $dados);
    }

}
