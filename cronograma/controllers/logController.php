<?php

/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class logController extends controller {

    public function index() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $log = new log();
            $dados['logs'] = $log->getLista();
            $this->loadTemplate('log/log', $dados);
        }
    }

    public function formAlterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $log = new log();
            $dados['logs'] = $log->getUnico($id);
            $this->loadTemplate('log/formlogUpdate', $dados);
        }
    }

}