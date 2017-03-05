<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("TABELA","AtividadePadrao");
/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class atividadePadrao extends model {
 public $valor_atenrior = null;
    public $valor_atual = null;
    public function getLista() {
        $array = array();
        $sql = $this->db->prepare("select id_atividades_padroes, 
                                      nome_atividades_padroes,
                                      descricao_atividades_padroes,
                                      ie_obrigatorio_atividades_padroes,
                                      id_pmbok_versao,
                                      obter_desc_pmbok(id_pmbok_versao) as desc_pmbok
                               from atividades_padroes");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function add_atividades_padroes($array_dados = array()) {
        if (count($array_dados) > 1) {   
            $string = "INSERT INTO `atividades_padroes`"
                                    . "(`nome_atividades_padroes`, "
                                    . "`descricao_atividades_padroes`, "
                                    . "`ie_obrigatorio_atividades_padroes`, "
                                    . "`id_pmbok_versao`) "
                                    . "VALUES ('" . $array_dados['nome_atividade_padrao'] . "',"
                                    . "'" . $array_dados['desc_atividade_padrao'] . "',"
                                    . "'" . $array_dados['ie_obrigatorio'] . "',"
                                    . "'" . $array_dados['id_pmbok_versao'] . "')";
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    public function alterar_atividades_padroes($array_dados = array(), $id) {
        $valor_anterior = $this->getStringLog($id);
        if (count($array_dados) > 1) {
            $string = "update `atividades_padroes` "
                    . "set `nome_atividades_padroes` = '" . $array_dados['nome_atividade_padrao'] . "', "
                    . "`descricao_atividades_padroes` = '" . $array_dados['desc_atividade_padrao'] . "', "
                    . "`ie_obrigatorio_atividades_padroes` = '" . $array_dados['ie_obrigatorio'] . "', "
                    . "`id_pmbok_versao` = '" . $array_dados['id_pmbok_versao'] . "' "
                    . "where id_atividades_padroes = " . $id;            
            $sql = $this->db->prepare($string);
            $sql->execute();
        $valor_atual = $this->getStringLog($id);
        $log = $this->insere_log($sql,$string,TABELA,$valor_anterior,$valor_atual);
        
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `atividades_padroes` WHERE id_atividades_padroes = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
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

    public function getPmbok() {
        $array = array();
        $sql = $this->db->prepare("select * from pmbok_versao");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getStringLog($id) {
         $resultado = $this->getUnico($id);
        extract($resultado['0']);
        return $valor_atenrior = 'id = '.$id_atividades_padroes.
                          ' nome = '.$nome_atividades_padroes.
                          ' Descricao = '.$descricao_atividades_padroes.
                          ' Obrigatorio = '.$ie_obrigatorio_atividades_padroes.
                          ' PMBOK = '.$id_pmbok_versao;
    }

}
