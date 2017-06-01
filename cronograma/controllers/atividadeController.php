<?php


/**
 * Description of atividadeController
 *
 * @author Gustavo Martins
 */
class atividadeController extends controller {

    public function index() {
 
       if(!isset($_SESSION))     {         session_start();     } 
    
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $dados['atividades'] = $atividades->getLista();
    
            $this->loadTemplate('atividade/atividade', $dados);
        }
    }

    public function atividadesProjeto($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $_SESSION['id_projeto'] = $id;
            $atividades = new atividade();
            $subAtividade = new subatividade();
            $dados['atividades'] = $atividades->listaAtividadesProjeto($id);
            $dados['subatividades'] = $subAtividade->getProjetoSubatividade();
            $this->loadTemplate('atividade/atividadeProjeto', $dados);
        }
    }
    
    public function excluir($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->excluir($id);
            header('Location: /cronograma/atividade/atividadesProjeto/'.$_SESSION['id_projeto']);
        }
    }

    public function formAlterar($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $dados['atividades'] = $atividades->getUnico($id);
            $dados['projetos'] = $atividades->getProjeto();
            $this->loadTemplate('atividade/formatividadeUpdate', $dados);
        }
    }
    
    public function addPadrao($dados = array()) {
       //if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {            
            // tratando variavel post
            $atividades = new atividade();
            $atividades->add_atividades($dados);
            header('Location: /cronograma/atividade/atividadesProjeto/'.$_SESSION['id_projeto']);
        }
    }

    public function add() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->add_atividades($_POST);
            $id = $atividades->getUltimo();
            header('Location: /cronograma/atividade/atividadesProjeto/'.$_SESSION['id_projeto']);
        }
    }

    public function form_add() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            if($_SESSION['nome_perfil']=='Orientando'){
            $dados['projetos'] = $atividades->getProjetoOrientando();
            }
            else if ($_SESSION['nome_perfil']=='Orientador') {
                $dados['projetos'] = $atividades->getProjetoOrientador();
            }
            else{
               $dados['projetos'] = $atividades->getProjeto();
            }
            $this->loadTemplate('atividade/formAtividade', $dados);
        }
    }

    public function alterar($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->alterar_atividades($id,$_POST);
            header('Location: /cronograma/atividade/atividadesProjeto/'.$_SESSION['id_projeto']);
        }
    }
    
     public function executar($id) {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->executar_atividades($id);
            header('Location: /cronograma/atividade/atividadesProjeto/'.$_SESSION['id_projeto']);
        }
    }
    
         public function validar($id) {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->validar_execucao($id);
            header('Location: /cronograma/atividade/atividadesProjeto/'.$_SESSION['id_projeto']);
        }
    }

}
