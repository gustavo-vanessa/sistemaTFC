<?php


/**
 * Description of atividadeController
 *
 * @author Gustavo Martins
 */
class atividadeController extends controller {

    public function index() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $dados['atividades'] = $atividades->getLista();
    
            $this->loadTemplate('atividade/atividade', $dados);
        }
    }

    public function atividadesProjeto($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $subAtividade = new subatividade();
            $dados['atividades'] = $atividades->listaAtividadesProjeto($id);
            foreach ($dados['atividades'] as $atividade) {
                 $dados['subatividades'] = $subAtividade->listaAtividade($atividade['id_atividade']);
            }           
            $this->loadTemplate('atividade/atividadeProjeto', $dados);
        }
    }
    
    public function excluir($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->excluir($id);
            header('Location: /cronograma/atividade');
        }
    }

    public function formAlterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $dados['atividades'] = $atividades->getUnico($id);
            $dados['projetos'] = $atividades->getProjeto();
            $this->loadTemplate('atividade/formatividadeUpdate', $dados);
        }
    }
    
    public function addPadrao() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {            
            // tratando variavel post
            
            
            $atividades = new atividade();
            $atividades->add_atividades($_POST);
            header('Location: /cronograma/atividade');
        }
    }

    public function add() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->add_atividades($_POST);
            $id = $atividades->getUltimo();
            header('Location: /cronograma/atividade/atividadesProjeto/'.$this->getProjeto($id[0]['id_atividade']));
        }
    }

    public function form_add() {
        session_start();
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
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->alterar_atividades($_POST, $id);
            header('Location: /cronograma/atividade');
        }
    }
    
     public function executar($id) {
         session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->executar_atividades($id);
            header('Location: /cronograma/atividade/atividadesProjeto/'.$this->getProjeto($id));
        }
    }
    
         public function validar($id) {
         session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividades = new atividade();
            $atividades->validar_execucao($id);
            header('Location: /cronograma/atividade/atividadesProjeto/'.$this->getProjeto($id));
        }
    }
    
    
    public function getProjeto($id) {
             $atividades = new atividade();
            $dados['atividades'] = $atividades->getProjetoAtividade($id);
            $id_projeto = $dados['atividades'][0]['id_projeto'];
            return $id_projeto;
        }

}
