<?php
/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class perfilController extends controller {

    public function index() {
        session_start();
        if(!isset($_SESSION['id_usuario'])|| !isset($_SESSION['nome_usuario'])){
            
            header('Location: /cronograma');
        } else {
        $perfis = new perfil();
        $dados['perfis'] = $perfis->getLista();
        $this->loadTemplate('perfil/perfil', $dados);
        }
    }


    public function formAlterar($id) {
        session_start();
        if(!isset($_SESSION['id_usuario'])|| !isset($_SESSION['nome_usuario'])){
            header('Location: /cronograma');
        } else {
        $perfis = new perfil();
        $dados['perfis'] = $perfis->getUnico($id);
        $this->loadTemplate('perfil/formperfilUpdate', $dados);
        }
    }
}
