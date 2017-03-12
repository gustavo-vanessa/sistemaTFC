<?php

/**
 * Description of atividadePadraoController
 *
 * @author Gustavo Martins
 */
class atividadePadraoController extends controller {

    public function index() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $dados['atividadesPadroes'] = $atividadesPadroes->getLista();
            $this->loadTemplate('atividadePadrao/atividadePadrao', $dados);
        }
    }

    public function excluir($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $atividadesPadroes->excluir($id);
            header('Location: /cronograma/atividadePadrao');
        }
    }

    public function formAlterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $dados['atividadesPadroes'] = $atividadesPadroes->getUnico($id);
            $dados['pmboks'] = $atividadesPadroes->getPmbok();
            $this->loadTemplate('atividadePadrao/formatividadePadraoUpdate', $dados);
        }
    }

    public function add() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $atividadesPadroes->add_atividades_padroes($_POST);
            header('Location: /cronograma/atividadePadrao');
        }
    }

    public function form_add() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $dados['pmboks'] = $atividadesPadroes->getPmbok();
            $this->loadTemplate('atividadePadrao/formAtividadePadrao', $dados);
        }
    }

    public function alterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $atividadesPadroes->alterar_atividades_padroes($_POST, $id);
            header('Location: /cronograma/atividadePadrao');
        }
    }

}
