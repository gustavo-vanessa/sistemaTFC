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
        $perfil = new perfil();
        $dados['perfis'] = $perfil->getLista();
        $this->loadTemplate('usuario/formUsuario', $dados);
    }

    public function add() {
        $usuarios = new usuario();
        $usuario['nome_usuario'] = $_POST['nome_usuario'];
        $usuario['login_usuario'] = $_POST['login_usuario'];
        $usuario['Password_usuario'] = $_POST['Password_usuario'];
        $usuario['Email_usuario'] = $_POST['Email_usuario'];
        $perfil['Orientador'] = $_POST['Orientador'];
        $perfil['Orientando'] = $_POST['Orientando'];
        $perfil['Coordenador'] = $_POST['Coordenador'];
       
        $usuarios->add_usuario($usuario);
        $perfilUsuario = new perfilUsuario();
        $id = $usuarios->ultimoId();
        extract($id[0]);
        if($perfil['Orientando'] = 'on'){
        $dados['id_usuario'] = $id_usuario;
        $dados['id_perfil'] = '2';
        $perfilUsuario->add_perfil_usuario($dados);

        }
        
        
        $this->index();
    }
    
    public function alterar($id) {
       $usuarios = new usuario();
        $usuarios->alterar_usuario($_POST, $id);
        $this->index(); 
        
    }
}
