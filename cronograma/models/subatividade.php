<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("TABELA", "Subatividade");
/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class subatividade extends model {
 public $valor_atenrior = null;
    public $valor_atual = null;
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
    
    public function listaAtividade($id_atividade) {
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
                                   from sub_atividade
                                   where id_atividade = ".$id_atividade);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    

    public function add_subatividades($array_dados = array()) {
        if (count($array_dados) > 1) { 
            $string = "INSERT INTO `sub_atividade`"
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
                                    . "'" . $array_dados['observacoes_sub_atividade'] . "')";
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    public function alterar_subatividades($array_dados = array(), $id) {
        $valor_anterior = $this->getStringLog($id);
        if (count($array_dados) > 1) {
          $string = "update `sub_atividade` "
                    . "set `nome_sub_atividade` = '" . $array_dados['nome_sub_atividade'] . "', "
                    . "`status_sub_atividade` = '" . $array_dados['status_sub_atividade'] . "', "
                    . "`id_atividade` = '" . $array_dados['id_atividade'] . "', "
                     . "`data_inicio_sub_atividade` = '" . $array_dados['data_inicio_sub_atividade'] . "', "
                     . "`data_fim_sub_atividade` = '" . $array_dados['data_fim_sub_atividade'] . "', "
                     . "`data_validacao_sub_atividade` = '" . $array_dados['data_validacao_sub_atividade'] . "', "
                    . "`observacoes_sub_atividade` = '" . $array_dados['observacoes_sub_atividade'] . "' "
                    . "where id_sub_atividade = " . $id;
          $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $log = $this->insere_log($sql,$string,TABELA,$valor_anterior,$valor_atual);
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `sub_atividade` WHERE id_sub_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
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

    public function getStringLog($id) {
        $resultado = $this->getUnico($id);
        extract($resultado['0']);
        return $valor = 'id = '.$id_sub_atividade.
                          ' nome = '.$nome_sub_atividade.
                          ' status = '.$status_sub_atividade.
                          ' id atividade = '.$id_atividade.
                          ' data inicio = '.$data_inicio_sub_atividade.
                          ' data fim = '.$data_fim_sub_atividade.
                          ' data validacao = '.$data_validacao_sub_atividade.
                          ' observacoes = '.$observacoes_sub_atividade;
        
        
    }
}
