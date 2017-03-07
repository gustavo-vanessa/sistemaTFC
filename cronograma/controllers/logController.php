<?php
/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class logController extends controller {

    public function index() {

        $log = new log();
        $dados['logs'] = $log->getLista();
        $this->loadTemplate('log/log', $dados);
    }
    public function formAlterar($id) {
        $log = new log();
        $dados['logs'] = $log->getUnico($id);
        $this->loadTemplate('log/formlogUpdate', $dados);
    }
}
