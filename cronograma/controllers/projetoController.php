<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projetoController
 *
 * @author Gustavo Martins
 */
class projetoController extends controller {

    //put your code here public function index() {
    public function index() {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            if ($_SESSION['nome_perfil'] === 'Coordenador') {
                $dados['projetos'] = $projeto->getLista();
                $dados['orientadores'] = $projeto->getOrientador();
                $dados['orientandos'] = $projeto->getOrientando();
                $dados['retornos'] = $this->nvl($_SESSION['retorno']);
                unset($_SESSION['retorno']);
                $this->loadTemplate('projeto/projeto', $dados);
            } else if ($_SESSION['nome_perfil'] === 'Orientador') {
                $dados['orientadores'] = $projeto->getOrientador();
                $dados['orientandos'] = $projeto->getOrientando();
                $dados['projetos'] = $projeto->getListaOrientador();
                $dados['retornos'] = $this->nvl($_SESSION['retorno']);
                unset($_SESSION['retorno']);
                $this->loadTemplate('projeto/projeto', $dados);
            } else {
                $dados['projetos'] = $projeto->getListaOrientando();
                $dados['retornos'] = $this->nvl($_SESSION['retorno']);
                unset($_SESSION['retorno']);
                $this->loadTemplate('projeto/projeto', $dados);
            }
        }
    }

    function nvl(&$var, $default = "vazio") {
        return isset($var) ? $var : $default;
    }

    public function filtro() {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $id_orientador = 0;
            $id_orientando = 0;
            if (isset($_POST['id_orientador'])) {
                $id_orientador = $_POST['id_orientador'];
            }
            if (isset($_POST['id_orientando'])) {
                $id_orientando = $_POST['id_orientando'];
            }



            $projeto = new projeto();
            if ($_SESSION['nome_perfil'] === 'Coordenador') {
                $dados['orientadores'] = $projeto->getOrientador();
                $dados['orientandos'] = $projeto->getOrientando();
                $dados['projetos'] = $projeto->getListaCoordenadorFiltro($id_orientador, $id_orientando);
                $this->loadTemplate('projeto/projeto', $dados);
            } else if ($_SESSION['nome_perfil'] === 'Orientador') {
                $dados['orientandos'] = $projeto->getOrientando();
                $dados['projetos'] = $projeto->getListaOrientadorFiltro($id_orientando);
                $this->loadTemplate('projeto/projeto', $dados);
            } else {
                $dados['projetos'] = $projeto->getListaOrientando();
                $this->loadTemplate('projeto/projeto', $dados);
            }
        }
    }

    public function excluir($id) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            $_SESSION['retorno'] = $projeto->excluir($id);
            header('Location: /cronograma/projeto');
        }
    }

    public function formAlterar($id) {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            $dados['orientadores'] = $projeto->getOrientador();
            $dados['orientandos'] = $projeto->getOrientando();
            $dados['pmboks'] = $projeto->getPmbok();
            $dados['projetos'] = $projeto->getUnico($id);
            $this->loadTemplate('projeto/formProjetoUpdate', $dados);
        }
    }

    public function form_add() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $dados = array();
            $projeto = new projeto();
            $dados['orientadores'] = $projeto->getOrientador();
            $dados['orientandos'] = $projeto->getOrientando();
            $dados['pmboks'] = $projeto->getPmbok();
            $this->loadTemplate('projeto/formProjeto', $dados);
        }
    }

    public function add() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            $projeto->add_projeto($_POST);
            header('Location: /cronograma/projeto');
        }
    }

    public function alterar($id) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            $projeto->alterar_projeto($id, $_POST);
            header('Location: /cronograma/projeto');
        }
    }

    public function validarProjeto($id) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {

            $projeto = new projeto();
            $projeto->validar_projeto($id);
            header('Location: /cronograma/projeto');
        }
    }

}
