<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projetoController
 *
 * @author Gustavo Martins
 */
class projetoController extends controller{
    //put your code here public function index() {
    public function index() {
        $projeto = new projeto();
        $dados['projetos'] = $projeto->getLista();      
        $this->loadTemplate('projeto', $dados);
    }

    public function excluir($id) {
        $projeto = new projeto();
        $projeto->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $projeto = new projeto();
        $dados['orientadores'] = $projeto->getOrientador(); 
        $dados['orientandos'] = $projeto->getOrientando();
        $dados['pmboks'] = $projeto->getPmbok();
        $dados['projetos'] = $projeto->getUnico($id);
        $this->loadTemplate('formProjetoUpdate', $dados);
    }

    public function form_add() {
        $dados = array();
        $projeto = new projeto();
        $dados['orientadores'] = $projeto->getOrientador(); 
        $dados['orientandos'] = $projeto->getOrientando();
        $dados['pmboks'] = $projeto->getPmbok();
        $this->loadTemplate('formProjeto', $dados);
    }

    public function add() {
        $projeto = new projeto();
        $projeto->add_projeto($_POST);
        $this->index();
    }
    
    public function alterar($id) {
       $projeto = new projeto();
        $projeto->alterar_projeto($_POST, $id);
        $this->index(); 
        
    }
    
   
}