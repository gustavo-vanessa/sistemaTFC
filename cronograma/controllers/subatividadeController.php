<?php
/**
 * Description of atividadeController
 *
 * @author Gustavo Martins
 */
class subatividadeController extends controller {

    public function index() {

        $subatividades = new subatividade();
        $dados['subatividades'] = $subatividades->getLista();
        $this->loadTemplate('subatividade', $dados);
    }

    public function excluir($id) {
        $subatividades = new subatividade();
        $subatividades->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $subatividades = new subatividade();
        $dados['subatividades'] = $subatividades->getUnico($id);
        $dados['atividades'] = $subatividades->getAtividade();
        $this->loadTemplate('formSubatividadeUpdate', $dados);
    }

    public function add() {
        $subatividades = new subatividade();
        $subatividades->add_subatividades($_POST);
        $this->index();
    }
    
     public function form_add() {
         $subatividades = new subatividade();
         $dados['atividades'] = $subatividades->getAtividade();
        $this->loadTemplate('formSubatividade', $dados);
    }
    
    public function alterar($id) {
        $subatividades = new subatividade();
        $subatividades->alterar_subatividades($_POST, $id);
        $this->index(); 
        
    }

}