<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validacoes
 *
 * @author Vanessa Marques
 */
class validacoesController extends controller {

    public function index() {
        $dados = array();
        $login = new login();
        $login_usuario = null;
        $password = null;
        if ($_POST) {
            $login_usuario = $_POST['Login'];
            $password = $_POST['Password'];
            $dados['usuarios'] = $login->usuario($login_usuario, $password);

            if (count($dados['usuarios']) == 1) {
                $sessao['nome_usuario'] = $dados['usuarios'][0]['nome_usuario'];
                $sessao['nome_perfil'] = $dados['usuarios'][0]['nome_perfil'];
                $sessao['id_usuario'] =  $dados['usuarios'][0]['id_usuario'];
                $this->verificaPerfil($sessao['nome_perfil'],$sessao);
            } elseif (count($dados['usuarios']) > 1) {
                print_r($dados);
                exit;
                $this->loadTemplate('home/homeControlador', $dados);
            } else {
                $dados['mensagem'] = "Usuario ou senha invalida";
                $this->loadTemplate('loginErro', $dados);
            }
        }
    }

    private function verificaPerfil($nome_perfil,$dados) {
        $home = new homeController();
        if ($nome_perfil == "Coordenador") {
            $home->coordenador($dados);
        } else if ($nome_perfil == "Orientador") {
            $home->orientador($dados);
        } else {
            $home->orientando($dados);
        }
        exit;
    }

}
