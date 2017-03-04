<?php
/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class pmbokController extends controller {

    public function index() {

        $pmboks = new pmbok();
        $dados['pmboks'] = $pmboks->getLista();
        $this->loadTemplate('pmbok/pmbok', $dados);
    }

    public function excluir($id) {
        $pmboks = new pmbok();
        $pmboks->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $pmboks = new pmbok();
        $dados['pmboks'] = $pmboks->getUnico($id);
        $this->loadTemplate('pmbok/formPmbokUpdate', $dados);
    }

    public function add() {
        $pmboks = new pmbok();
        $pmboks->add_pmbok($_POST);
        $this->index();
    }
    
     public function form_add() {
        $dados = array();
        $this->loadTemplate('pmbok/formPmbok', $dados);
    }
    
    public function alterar($id) {
       $pmboks = new pmbok();
        $pmboks->alterar_pmbok($_POST, $id);
        $this->index(); 
        
    }

}
