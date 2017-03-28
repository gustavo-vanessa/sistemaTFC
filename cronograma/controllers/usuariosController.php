<?php

/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class usuariosController extends controller {

    public function index() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $usuarios = new usuario();
            $dados['usuarios'] = $usuarios->getLista();
            $this->loadTemplate('usuario/usuario', $dados);
        }
    }

    public function excluir($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $usuarios = new usuario();
            $perfilUsuario = new perfilUsuario();
            $projeto = new projeto();
            $teste = $projeto->getProjetosUsuario($id);

            if ($teste == 0) {
                $perfilUsuario->excluir($id);
                $usuarios->excluir($id);
            }

            header('Location: /cronograma/usuarios');
        }
    }

    public function formAlterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $usuarios = new usuario();
            $perfil = new perfil();
            $perfilUsuario = new perfilUsuario();
            $dados['perfilUsuarios'] = $perfilUsuario->getUnico($id);
            $dados['perfis'] = $perfil->getLista();
            $dados['usuarios'] = $usuarios->getUnico($id);
            $this->loadTemplate('usuario/formUsuarioUpdate', $dados);
        }
    }

    public function form_add() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $perfil = new perfil();
            $dados['perfis'] = $perfil->getLista();
            $this->loadTemplate('usuario/formUsuario', $dados);
        }
    }

    public function add() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $usuarios = new usuario();
            $Orientador = null;
            $Orientando = null;
            $Coordenador = null;
            extract($_POST);
            $usuario['nome_usuario'] = $nome_usuario;
            $usuario['login_usuario'] = $login_usuario;
            $usuario['Password_usuario'] = $Password_usuario;
            $usuario['Email_usuario'] = $Email_usuario;
            $perfil['Orientador'] = $Orientador;
            $perfil['Orientando'] = $Orientando;
            $perfil['Coordenador'] = $Coordenador;
            $usuarios->add_usuario($usuario);

            $id = $usuarios->ultimoId();

            extract($id[0]);
            $this->inserirPerfilUsuario($perfil, $id_usuario);


            header('Location: /cronograma/usuarios');
        }
    }

    public function alterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {

            $usuarios = new usuario();
            $perfilUsuario = new perfilUsuario();
            $Orientador = null;
            $Orientando = null;
            $Coordenador = null;
            extract($_POST);
            $usuario['nome_usuario'] = $nome_usuario;
            $usuario['login_usuario'] = $login_usuario;
            $usuario['Password_usuario'] = $Password_usuario;
            $usuario['Email_usuario'] = $Email_usuario;
            $perfil['Orientador'] = $Orientador;
            $perfil['Orientando'] = $Orientando;
            $perfil['Coordenador'] = $Coordenador;
            $perfilUsuario->excluir($id);
            $usuarios->alterar_usuario($usuario, $id);
            $this->inserirPerfilUsuario($perfil, $id);
            header('Location: /cronograma/usuarios');
        }
    }

    public function inserirPerfilUsuario($perfil = array(), $id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $perfilUsuario = new perfilUsuario();
            if ($perfil['Orientando'] == 'on') {
                $dados['id_usuario'] = $id;
                $dados['id_perfil'] = '2';
                $perfilUsuario->add_perfil_usuario($dados);
            } else {
                if ($perfil['Coordenador'] == 'on') {
                    $dados['id_usuario'] = $id;
                    $dados['id_perfil'] = '3';
                    $perfilUsuario->add_perfil_usuario($dados);
                }
                if ($perfil['Orientador'] == 'on') {
                    $dados['id_usuario'] = $id;
                    $dados['id_perfil'] = '1';
                    $perfilUsuario->add_perfil_usuario($dados);
                }
            }
        }
    }

}
