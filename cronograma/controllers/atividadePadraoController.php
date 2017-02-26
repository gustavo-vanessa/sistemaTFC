<?php
/**
 * Description of atividadePadraoController
 *
 * @author Gustavo Martins
 */
class atividadePadraoController extends controller {

    public function index() {

        $atividadesPadroes = new atividadePadrao();
        $dados['atividadesPadroes'] = $atividadesPadroes->getLista();
        $this->loadTemplate('atividadePadrao', $dados);
    }

    public function excluir($id) {
        $atividadesPadroes = new atividadePadrao();
        $atividadesPadroes->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $atividadesPadroes = new atividadePadrao();
        $dados['atividadesPadroes'] = $atividadesPadroes->getUnico($id);
        $dados['pmboks'] = $atividadesPadroes->getPmbok();
        $this->loadTemplate('formatividadePadraoUpdate', $dados);
    }

    public function add() {
        $atividadesPadroes = new atividadePadrao();
        $atividadesPadroes->add_atividades_padroes($_POST);
        $this->index();
    }
    
     public function form_add() {
         $atividadesPadroes = new atividadePadrao();
         $dados['pmboks'] = $atividadesPadroes->getPmbok();
        $this->loadTemplate('formAtividadePadrao', $dados);
    }
    
    public function alterar($id) {
       $atividadesPadroes = new atividadePadrao();
        $atividadesPadroes->alterar_atividades_padroes($_POST, $id);
        $this->index(); 
        
    }

}
