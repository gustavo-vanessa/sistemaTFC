<?php
/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class perfilController extends controller {

    public function index() {

        $perfis = new perfil();
        $dados['perfis'] = $perfis->getLista();
        $this->loadTemplate('perfil', $dados);
    }

    public function excluir($id) {
        $perfis = new perfil();
        $perfis->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $perfis = new perfil();
        $dados['perfis'] = $perfis->getUnico($id);
        $this->loadTemplate('formperfilUpdate', $dados);
    }

    public function add() {
        $perfis = new perfil();
        $perfis->add_perfil($_POST);
        $this->index();
    }
    
     public function form_add() {
        $dados = array();
        $this->loadTemplate('formPerfil', $dados);
    }
    
    public function alterar($id) {
       $perfis = new perfil();
        $perfis->alterar_perfil($_POST, $id);
        $this->index(); 
        
    }

}
