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
                                          status_atividade, 
                                          id_projeto, 
                                          obter_nome_projeto(id_projeto, id_atividade) as nome_projeto, 
                                          data_inicio_atividade, 
                                          data_fim_atividade, 
                                          data_validacao_atividade, 
                                          observacoes_atividade 
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
                                    . "`status_atividade`, "
                                    . "`id_projeto`, "
                                    . "`data_inicio_atividade`, "
                                    . "`data_fim_atividade`, "
                                    . "`data_validacao_atividade`, "
                                    . "`observacoes_atividade`) "
                                    . "VALUES ('" . $array_dados['nome_atividade'] . "',"
                                    . "'" . $array_dados['status_atividade'] . "',"
                                    . "'" . $array_dados['id_projeto'] . "',"
                                    . "'" . $array_dados['data_inicio_atividade'] . "',"
                                    . "'" . $array_dados['data_fim_atividade'] . "',"
                                    . "'" . $array_dados['data_validacao_atividade'] . "',"
                                    . "'" . $array_dados['observacoes_atividade'] . "')");
            $sql->execute();
            return;
        }
    }

    public function alterar_atividades($array_dados = array(), $id) {
  
        if (count($array_dados) > 1) {
            
            $sql = $this->db->prepare("update `atividade` "
                    . "set `nome_atividade` = '" . $array_dados['nome_atividade'] . "', "
                    . "`status_atividade` = '" . $array_dados['status_atividade'] . "', "
                    . "`id_projeto` = '" . $array_dados['id_projeto'] . "', "
                     . "`data_inicio_atividade` = '" . $array_dados['data_inicio_atividade'] . "', "
                     . "`data_fim_atividade` = '" . $array_dados['data_fim_atividade'] . "', "
                     . "`data_validacao_atividade` = '" . $array_dados['data_validacao_atividade'] . "', "
                    . "`observacoes_atividade` = '" . $array_dados['observacoes_atividade'] . "' "
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

    public function getProjeto() {
        $array = array();
        $sql = $this->db->prepare("select * from projeto");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}
