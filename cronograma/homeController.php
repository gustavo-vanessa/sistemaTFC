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
        session_start();
        session_destroy();
        $this->loadTemplate('login', $dados);
    }

    public function coordenador($dados = array()) {

        if (count($dados) > 0) {
            session_start();
            $_SESSION["id_usuario"] = $dados['id_usuario'];
            $_SESSION["nome_usuario"] = $dados['nome_usuario'];
            $_SESSION["nome_perfil"] = $dados['nome_perfil'];
        }
        $this->loadTemplate('home/homeCoordenador', $dados);
    }

    public function orientador($dados = array()) {

        if (count($dados) > 0) {
            session_start();
            $_SESSION["id_usuario"] = $dados['id_usuario'];
            $_SESSION["nome_usuario"] = $dados['nome_usuario'];
            $_SESSION["nome_perfil"] = $dados['nome_perfil'];
        }
        $this->loadTemplate('home/homeOrientador', $dados);
    }

    public function orientando($dados = array()) {
        if (count($dados) > 0) {
            session_start();
            $_SESSION["id_usuario"] = $dados['id_usuario'];
            $_SESSION["nome_usuario"] = $dados['nome_usuario'];
            $_SESSION["nome_perfil"] = $dados['nome_perfil'];
        }
        $this->loadTemplate('home/homeOrientando', $dados);
    }

}
