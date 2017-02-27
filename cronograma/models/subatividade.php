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
class subatividade extends model {

    public function getLista() {
        $array = array();
        $sql = $this->db->prepare("select id_sub_atividade, 
                                         nome_sub_atividade,
                                         descricao_sub_atividade,
                                         ie_obrigatorio_sub_atividade,
                                         id_atividade,
                                         obter_nome_atividade (id_atividade, id_sub_atividade)      
                                  from sub_atividade");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function add_subatividades($array_dados = array()) {
        if (count($array_dados) > 1) { 
            $sql = $this->db->prepare("INSERT INTO `sub_atividade`"
                                    . "(`nome_sub_atividade`, "
                                    . "`descricao_sub_atividade`, "
                                    . "`ie_obrigatorio_sub_atividade`, "
                                    . "`id_atividade`) "
                                    . "VALUES ('" . $array_dados['nome_subatividade'] . "',"
                                    . "'" . $array_dados['desc_subatividade'] . "',"
                                    . "'" . $array_dados['ie_obrigatorio'] . "',"
                                    . "'" . $array_dados['id_atividade'] . "')");
            $sql->execute();
            return;
        }
    }

    public function alterar_atividades($array_dados = array(), $id) {
  
        if (count($array_dados) > 1) {
            
            $sql = $this->db->prepare("update `atividade` "
                    . "set `nome_atividade` = '" . $array_dados['nome_atividade'] . "', "
                    . "`descricao_atividade` = '" . $array_dados['desc_atividade'] . "', "
                    . "`ie_obrigatorio_atividade` = '" . $array_dados['ie_obrigatorio'] . "', "
                    . "`id_pmbok_versao` = '" . $array_dados['id_pmbok_versao'] . "' "
                    . "where id_atividade = " . $id);
            $sql->execute();
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $sql = $this->db->prepare("DELETE FROM `sub_atividade` WHERE id_sub_atividade = " . $id);
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

    public function getAtividade() {
        $array = array();
        $sql = $this->db->prepare("select * from atividade");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}
