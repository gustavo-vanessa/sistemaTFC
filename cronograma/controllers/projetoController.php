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
        session_start();

        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            if ($_SESSION['nome_perfil'] === 'Coordenador') {
                $dados['projetos'] = $projeto->getLista();
                $this->loadTemplate('projeto/projeto', $dados);
            } else if ($_SESSION['nome_perfil'] === 'Orientador') {
                $dados['projetos'] = $projeto->getListaOrientador();
                $this->loadTemplate('projeto/projeto', $dados);
            } else {
                $dados['projetos'] = $projeto->getListaOrientando();
                $this->loadTemplate('projeto/projeto', $dados);
            }
        }
    }

    public function excluir($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            $projeto->excluir($id);
            header('Location: /cronograma/projeto');
        }
    }

    public function formAlterar($id) {
        session_start();

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
        session_start();
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
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            $projeto->add_projeto($_POST);
            header('Location: /cronograma/projeto');
        }
    }

    public function alterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            $projeto->alterar_projeto($id, $_POST);
            header('Location: /cronograma/projeto');
        }
    }

    public function validarProjeto($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {

            $projeto = new projeto();
            $projeto->validar_projeto($id);
            header('Location: /cronograma/projeto');
        }
    }

    public function relatorio() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {

            header('Location: /cronograma');
        } else {
            $projeto = new projeto();
            if ($_SESSION['nome_perfil'] === 'Coordenador') {
                $dados['projetos'] = $projeto->getLista();
            } else if ($_SESSION['nome_perfil'] === 'Orientador') {
                $dados['projetos'] = $projeto->getListaOrientador();
            } else {
                $dados['projetos'] = $projeto->getListaOrientando();
            }
            
            
            $pdf = new PDF('L');
            $header = array('Codigo', 'Nome', 'Status', 'Data Validação', 'Orientador', 'Orientando');
            $pdf->AddPage();
            $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
            $pdf->SetFont('DejaVu', '', 14);
            $pdf->tabelaProjeto($header, $dados['projetos']);
            $pdf->Output();
        }
    }

}
