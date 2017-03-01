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
                                          status_sub_atividade, 
                                          id_atividade, 
                                          obter_nome_atividade(id_atividade, id_sub_atividade) as nome_atividade, 
                                          data_inicio_sub_atividade, 
                                          data_fim_sub_atividade, 
                                          data_validacao_sub_atividade, 
                                          observacoes_sub_atividade 
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
                                    . "`status_sub_atividade`, "
                                    . "`id_atividade`, "
                                    . "`data_inicio_sub_atividade`, "
                                    . "`data_fim_sub_atividade`, "
                                    . "`data_validacao_sub_atividade`, "
                                    . "`observacoes_sub_atividade`) "
                                    . "VALUES ('" . $array_dados['nome_sub_atividade'] . "',"
                                    . "'" . $array_dados['status_sub_atividade'] . "',"
                                    . "'" . $array_dados['id_atividade'] . "',"
                                    . "'" . $array_dados['data_inicio_sub_atividade'] . "',"
                                    . "'" . $array_dados['data_fim_sub_atividade'] . "',"
                                    . "'" . $array_dados['data_validacao_sub_atividade'] . "',"
                                    . "'" . $array_dados['observacoes_sub_atividade'] . "')");
            $sql->execute();
            return;
        }
    }

    public function alterar_subatividades($array_dados = array(), $id) {
  
        if (count($array_dados) > 1) {
          $sql = $this->db->prepare("update `sub_atividade` "
                    . "set `nome_sub_atividade` = '" . $array_dados['nome_sub_atividade'] . "', "
                    . "`status_sub_atividade` = '" . $array_dados['status_sub_atividade'] . "', "
                    . "`id_atividade` = '" . $array_dados['id_atividade'] . "', "
                     . "`data_inicio_sub_atividade` = '" . $array_dados['data_inicio_sub_atividade'] . "', "
                     . "`data_fim_sub_atividade` = '" . $array_dados['data_fim_sub_atividade'] . "', "
                     . "`data_validacao_sub_atividade` = '" . $array_dados['data_validacao_sub_atividade'] . "', "
                    . "`observacoes_sub_atividade` = '" . $array_dados['observacoes_sub_atividade'] . "' "
                    . "where id_sub_atividade = " . $id);
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
        $sql = $this->db->prepare("select * from sub_atividade WHERE id_sub_atividade = " . $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getAtividade() {
        $array = array();
        $sql = $this->db->prepare("select id_atividade, nome_atividade from atividade");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}
