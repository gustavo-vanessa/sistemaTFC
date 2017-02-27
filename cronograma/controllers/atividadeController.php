<?php
/**
 * Description of atividadeController
 *
 * @author Gustavo Martins
 */
class atividadeController extends controller {

    public function index() {

        $atividades = new atividade();
        $dados['atividades'] = $atividades->getLista();
        $this->loadTemplate('atividade', $dados);
    }

    public function excluir($id) {
        $atividades = new atividade();
        $atividades->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $atividades = new atividade();
        $dados['atividades'] = $atividades->getUnico($id);
        $dados['pmboks'] = $atividades->getPmbok();
        $this->loadTemplate('formatividadeUpdate', $dados);
    }

    public function add() {
        $atividades = new atividade();
        $atividades->add_atividades_padroes($_POST);
        $this->index();
    }
    
     public function form_add() {
         $atividades = new atividade();
         $dados['pmboks'] = $atividades->getPmbok();
        $this->loadTemplate('formAtividade', $dados);
    }
    
    public function alterar($id) {
       $atividades = new atividade();
        $atividades->alterar_atividades_padroes($_POST, $id);
        $this->index(); 
        
    }

}
