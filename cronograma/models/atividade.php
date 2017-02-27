<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class atividade extends model {

    public function getLista() {
        $array = array();
        $sql = $this->db->prepare("select id_atividade, 
                                      nome_atividade,
                                      descricao_atividade,
                                      ie_obrigatorio_atividade,
                                      id_pmbok_versao,
                                      obter_desc_pmbok(id_pmbok_versao) as desc_pmbok
                               from atividade");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function add_atividades($array_dados = array()) {
        if (count($array_dados) > 1) {            
            $sql = $this->db->prepare("INSERT INTO `atividade`"
                                    . "(`nome_atividade`, "
                                    . "`descricao_atividade`, "
                                    . "`ie_obrigatorio_atividade`, "
                                    . "`id_pmbok_versao`) "
                                    . "VALUES ('" . $array_dados['nome_atividade_padrao'] . "',"
                                    . "'" . $array_dados['desc_atividade_padrao'] . "',"
                                    . "'" . $array_dados['ie_obrigatorio'] . "',"
                                    . "'" . $array_dados['id_pmbok_versao'] . "')");
            $sql->execute();
            return;
        }
    }

    public function alterar_atividades($array_dados = array(), $id) {
  
        if (count($array_dados) > 1) {
            
            $sql = $this->db->prepare("update `atividade` "
                    . "set `nome_atividade` = '" . $array_dados['nome_atividade_padrao'] . "', "
                    . "`descricao_atividade` = '" . $array_dados['desc_atividade_padrao'] . "', "
                    . "`ie_obrigatorio_atividade` = '" . $array_dados['ie_obrigatorio'] . "', "
                    . "`id_pmbok_versao` = '" . $array_dados['id_pmbok_versao'] . "' "
                    . "where id_atividade = " . $id);
            $sql->execute();
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $sql = $this->db->prepare("DELETE FROM `atividade` WHERE id_atividade = " . $id);
            $sql->execute();
            return;
        }
    }

    public function getUnico($id) {
        $array = array();
        $sql = $this->db->prepare("select * from atividade WHERE id_atividade = " . $id);
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
