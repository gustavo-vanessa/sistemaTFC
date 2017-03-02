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
class subatividadePadrao extends model {

    public function getLista() {
        $array = array();
       $sql = $this->db->prepare("select id_sub_atividades_padroes, 
                                         nome_sub_atividade_padroes,
                                         descricao_sub_atividades_padroes,
                                         ie_obrigatorio_sub_atividades_padroes,
                                         id_atividade_padroes,
                                         obter_nome_atividade_padrao (id_atividade_padroes, id_sub_atividades_padroes) nome_atividade      
                                  from sub_atividades_padroes");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function add_subatividades_padroes($array_dados = array()) {
        if (count($array_dados) > 1) { 
            $sql = $this->db->prepare("INSERT INTO `sub_atividades_padroes`"
                                    . "(`nome_sub_atividade_padroes`, "
                                    . "`descricao_sub_atividades_padroes`, "
                                    . "`ie_obrigatorio_sub_atividades_padroes`, "
                                    . "`id_atividade_padroes`) "
                                    . "VALUES ('" . $array_dados['nome_subatividade_padrao'] . "',"
                                    . "'" . $array_dados['desc_subatividade_padrao'] . "',"
                                    . "'" . $array_dados['ie_obrigatorio'] . "',"
                                    . "'" . $array_dados['id_atividade'] . "')");
            $sql->execute();
            return;
        }
    }

    public function alterar_atividades_padroes($array_dados = array(), $id) {
  
        if (count($array_dados) > 1) {
            
            $sql = $this->db->prepare("update `atividades_padroes` "
                    . "set `nome_atividades_padroes` = '" . $array_dados['nome_atividade_padrao'] . "', "
                    . "`descricao_atividades_padroes` = '" . $array_dados['desc_atividade_padrao'] . "', "
                    . "`ie_obrigatorio_atividades_padroes` = '" . $array_dados['ie_obrigatorio'] . "', "
                    . "`id_pmbok_versao` = '" . $array_dados['id_pmbok_versao'] . "' "
                    . "where id_atividades_padroes = " . $id);
            $sql->execute();
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $sql = $this->db->prepare("DELETE FROM `sub_atividades_padroes` WHERE id_sub_atividades_padroes = " . $id);
            $sql->execute();
            return;
        }
    }

    public function getUnico($id) {
        $array = array();
        $sql = $this->db->prepare("select * from atividades_padroes WHERE id_atividades_padroes = " . $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getAtividadePadrao() {
        $array = array();
        $sql = $this->db->prepare("select * from atividades_padroes");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}
