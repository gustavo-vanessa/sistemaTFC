<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projeto
 *
 * @author Gustavo Martins
 */
class projeto extends model {

    public function getLista() {
        $array = array();
        $sql = $this->db->prepare("SELECT p.id_projeto,
                                          p.nome_projeto,
                                          p.status_projeto,
                                          p.data_validacao,
                                          p.id_orientador,
                                          obter_nome_orientador (p.id_orientador) as nome_orientador,
                                          p.id_orientando,
                                          obter_nome_orientando (p.id_orientando) as nome_orientando,
                                          id_pmbok_versao,
                                          obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                   FROM projeto p");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function add_projeto($array_dados = array()) {
        if (count($array_dados) > 1) {
            $sql = $this->db->prepare("INSERT INTO`projeto` (`nome_projeto`, `status_projeto`, `data_validacao`, `id_orientador`, `id_orientando`, `id_pmbok_versao`) VALUES ('". $array_dados['nome_projeto'] . "', '" . $array_dados['status_projeto'] . "', '" . $array_dados['data_validacao'] . "', '" . $array_dados['id_orientador'] . "', '" . $array_dados['id_orientando'] . "', '" . $array_dados['id_pmbok_versao'] . "')");
            $sql->execute();
            return;
        }
    }

    public function alterar_projeto($array_dados = array(), $id) {
      
        if (count($array_dados) > 1) {
            $sql = $this->db->prepare("update `projeto` set `nome_projeto` = '" . $array_dados['nome_projeto'] . "', `status_projeto` = '" . $array_dados['status_projeto'] . "', `data_validacao` = '" . $array_dados['data_validacao'] . "', `id_orientador` = '" . $array_dados['id_orientador'] . "', `id_orientando` = '" . $array_dados['id_orientando']."' where id_projeto = " . $id);
            $sql->execute();
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $sql = $this->db->prepare("DELETE FROM `projeto` WHERE id_projeto = " . $id);
            $sql->execute();
            return;
        }
    }

    public function getUnico($id) {
        $array = array();
        $sql = $this->db->prepare("SELECT p.id_projeto,
                                          p.nome_projeto,
                                          p.status_projeto,
                                          p.data_validacao,
                                          p.id_orientador,
                                          obter_nome_orientador (p.id_orientador) as nome_orientador,
                                          p.id_orientando,
                                          obter_nome_orientando (p.id_orientando) as nome_orientando,
                                          id_pmbok_versao,
                                          obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                   FROM projeto p
                                   WHERE id_projeto = " . $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getOrientador() {
        $array = array();

        $sql = $this->db->prepare("select u.id_usuario, u.nome_usuario 
                                   from usuario u, perfil_do_usuario pu 
                                   where u.id_usuario = pu.usuario_id_usuario
                                   and pu.perfil_id_perfil = 1");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getOrientando() {
        $array = array();

        $sql = $this->db->prepare("select u.id_usuario, u.nome_usuario 
                                   from usuario u, perfil_do_usuario pu 
                                   where u.id_usuario = pu.usuario_id_usuario 
                                   and pu.perfil_id_perfil = 2");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getPmbok() {
        $array = array();
        $sql = $this->db->prepare("select * from pmbok_versao");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    
    
}
