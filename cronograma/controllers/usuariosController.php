<?php

/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class usuariosController extends controller {

    public function index() {

        $usuarios = new usuario();
        $dados['usuarios'] = $usuarios->getLista();
        $this->loadTemplate('usuario/usuario', $dados);
    }

    public function excluir($id) {
        $usuarios = new usuario();
        $usuarios->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $usuarios = new usuario();
        $dados['usuarios'] = $usuarios->getUnico($id);
        $this->loadTemplate('usuario/formUsuarioUpdate', $dados);
    }

    public function form_add() {
        $dados = array();
        $this->loadTemplate('usuario/formUsuario', $dados);
    }

    public function add() {
        $usuarios = new usuario();
        $usuarios->add_usuario($_POST);
        $this->index();
    }
    
    public function alterar($id) {
       $usuarios = new usuario();
        $usuarios->alterar_usuario($_POST, $id);
        $this->index(); 
        
    }
}
