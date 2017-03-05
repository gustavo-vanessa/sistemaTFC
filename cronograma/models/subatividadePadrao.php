<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("TABELA","Subatividade");
/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class subatividadePadrao extends model {
     public $valor_atenrior = null;
    public $valor_atual = null;

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
            $string = "INSERT INTO `sub_atividades_padroes`"
                                    . "(`nome_sub_atividade_padroes`, "
                                    . "`descricao_sub_atividades_padroes`, "
                                    . "`ie_obrigatorio_sub_atividades_padroes`, "
                                    . "`id_atividade_padroes`) "
                                    . "VALUES ('" . $array_dados['nome_subatividade_padrao'] . "',"
                                    . "'" . $array_dados['desc_subatividade_padrao'] . "',"
                                    . "'" . $array_dados['ie_obrigatorio'] . "',"
                                    . "'" . $array_dados['id_atividade'] . "')";
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    public function alterar_subatividades_padroes($array_dados = array(), $id) {
        $valor_anterior = $this->getStringLog($id);
        if (count($array_dados) > 1) {
            $string = "update `sub_atividades_padroes` "
                    . "set `nome_sub_atividade_padroes` = '" . $array_dados['nome_subatividade_padrao'] . "', "
                    . "`descricao_sub_atividades_padroes` = '" . $array_dados['desc_subatividade_padrao'] . "', "
                    . "`ie_obrigatorio_sub_atividades_padroes` = '" . $array_dados['ie_obrigatorio'] . "', "
                    . "`id_atividade_padroes` = '" . $array_dados['id_atividade'] . "' "
                    . "where id_sub_atividades_padroes = " . $id;
            $sql = $this->db->prepare($string);
            
            $sql->execute();
            $valor_atual = $this->getStringLog($id);     
            $log = $this->insere_log($sql,$string,TABELA,$valor_anterior,$valor_atual);
          
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `sub_atividades_padroes` WHERE id_sub_atividades_padroes = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    public function getUnico($id) {
        $array = array();
        $string = "select * from sub_atividades_padroes WHERE id_sub_atividades_padroes = " . $id;
        $sql = $this->db->prepare($string);
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
    
    public function getStringLog($id) {
        $resultado = $this->getUnico($id);
        extract($resultado['0']);
        return $valor = 'id = '.$id_sub_atividades_padroes.
                          ' nome = '.$nome_sub_atividade_padroes.
                          ' descricao = '.$descricao_sub_atividades_padroes.
                          ' id atividade principaç = '.$id_atividade_padroes.
                          ' obrigatorio = '.$ie_obrigatorio_sub_atividades_padroes;
    }

}
