<?php

/**
 * Description of atividadeController
 *
 * @author Gustavo Martins
 */
class subatividadeController extends controller {

    public function index() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $dados['subatividades'] = $subatividades->getLista();
            $this->loadTemplate('subatividade/subatividade', $dados);
        }
    }

    public function excluir($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $subatividades->excluir($id);
            header('Location: /cronograma/subatividade');
        }
    }

    public function formAlterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $dados['subatividades'] = $subatividades->getUnico($id);
            $dados['atividades'] = $subatividades->getAtividade();
            $this->loadTemplate('subatividade/formSubatividadeUpdate', $dados);
        }
    }

    public function add() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $subatividades->add_subatividades($_POST);
            header('Location: /cronograma/subatividade');
        }
    }

    public function form_add() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $dados['atividades'] = $subatividades->getAtividade();
            $this->loadTemplate('subatividade/formSubatividade', $dados);
        }
    }

    public function alterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $subatividades->alterar_subatividades($_POST, $id);
            header('Location: /cronograma/subatividade');
        }
    }

}
