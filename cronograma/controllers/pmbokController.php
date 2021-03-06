<?php

/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class pmbokController extends controller {

    public function index() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $pmboks = new pmbok();
            $dados['pmboks'] = $pmboks->getLista();
            $this->loadTemplate('pmbok/pmbok', $dados);
        }
    }

    public function excluir($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $pmboks = new pmbok();
            $pmboks->excluir($id);
            header('Location: /cronograma/pmbok');
        }
    }

    public function formAlterar($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $pmboks = new pmbok();
            $dados['pmboks'] = $pmboks->getUnico($id);
            $this->loadTemplate('pmbok/formPmbokUpdate', $dados);
        }
    }

    public function add() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $pmboks = new pmbok();
            $pmboks->add_pmbok($_POST);
            header('Location: /cronograma/pmbok');
        }
    }

    public function form_add() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $dados = array();
            $this->loadTemplate('pmbok/formPmbok', $dados);
        }
    }

    public function alterar($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $pmboks = new pmbok();
            $pmboks->alterar_pmbok($_POST, $id);
            header('Location: /cronograma/pmbok');
        }
    }

}
