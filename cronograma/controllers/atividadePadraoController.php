<?php

/**
 * Description of atividadePadraoController
 *
 * @author Gustavo Martins
 */
class atividadePadraoController extends controller {

    public function index() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $dados['atividadesPadroes'] = $atividadesPadroes->getLista();
            $this->loadTemplate('atividadePadrao/atividadePadrao', $dados);
        }
    }
    
    public function atividadesPadraoProjeto() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadrao = new atividadePadrao();
            $subAtividadePadrao = new subatividadePadrao();
            $dados['atividades'] = $atividadesPadrao->getLista();
            foreach ($dados['atividades'] as $atividade) {
                 $dados['subatividades'] = $subAtividadePadrao->listaAtividadePadrao($atividade['id_atividades_padroes']);
            } 
            $this->loadTemplate('atividadePadrao/atividadePadraoProjeto', $dados);
        }
    }

    public function excluir($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $atividadesPadroes->excluir($id);
            header('Location: /cronograma/atividadePadrao');
        }
    }

    public function formAlterar($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $dados['atividadesPadroes'] = $atividadesPadroes->getUnico($id);
            $dados['pmboks'] = $atividadesPadroes->getPmbok();
            $this->loadTemplate('atividadePadrao/formatividadePadraoUpdate', $dados);
        }
    }

    public function add() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $atividadesPadroes->add_atividades_padroes($_POST);
            header('Location: /cronograma/atividadePadrao');
        }
    }
    
    public function addPadrao() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
         
            $atividade = new atividadeController();
            foreach ($_POST as $atividades) {
                $array_dados['nome_atividade']=$atividades;
                $array_dados['id_projeto']=$_SESSION['id_projeto'];
                $array_dados['data_inicio_atividade']= date('Y/m/d');
                $array_dados['data_fim_atividade']= date('Y/m/d');
                $array_dados['observacoes_atividade']='';
                $atividade->addPadrao($array_dados);
            }
            
            
            
            //$atividadesPadroes = new atividadePadrao();
            //$atividadesPadroes->add_atividades_padroes($_POST);
            //header('Location: /cronograma/atividadePadrao');
        }
    }

    public function form_add() {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $dados['pmboks'] = $atividadesPadroes->getPmbok();
            $this->loadTemplate('atividadePadrao/formAtividadePadrao', $dados);
        }
    }

    public function alterar($id) {
       if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $atividadesPadroes = new atividadePadrao();
            $atividadesPadroes->alterar_atividades_padroes($_POST, $id);
            header('Location: /cronograma/atividadePadrao');
        }
    }
    
     
}
