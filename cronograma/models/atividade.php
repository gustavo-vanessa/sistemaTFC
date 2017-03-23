<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("tabela", "Atividade");
/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class atividade extends model {
    public $valor_atenrior = null;
    public $valor_atual = null;
    /**
 * 
 * @name Get Lista
 * @Funcionalidade Executa uma consulta no banco de dados e retorna um array com os dados obtidos
 * @return Array 
 */
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

        if ($sql) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function listaAtividadesProjeto($id_projeto) {
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
                                   from atividade
                                   where id_projeto = ".$id_projeto);
        $sql->execute();

        if ($sql) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    /**
     * @name Adicionar Atividades
     * @param Array $array_dados
     * @funcionalidade Recebe um array de dados do controller e atribui os dados a string que será executada no banco da dados, após isso chama a função para inserção na tabela de log
     * @return type null
     */
    public function add_atividades($array_dados = array()) {
        if (count($array_dados) > 1) {
            $string = "INSERT INTO `atividade`"
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
                    . "'" . $array_dados['observacoes_atividade'] . "')";
            $sql = $this->db->prepare($string);
            $sql->execute();
             $log = $this->insere_log($sql,$string,tabela, $this->valor_atenrior, $this->valor_atual);
           }
    }
/**
 * @name Aterar Atividade
 * @Funcionalidade Recebe um array com o dados que serão alterados no banco juntamente com o id da informação que será alterada e após chama a função para inserção na tabela de log
 * @param Array $array_dados
 * @param inteiro $id
 * @return null
 */
    public function alterar_atividades($array_dados = array(), $id) {
        $valor_atenrior = $this->getStringLog($id);                 
        if (count($array_dados) > 1) {
            $string = "update `atividade` "
                    . "set `nome_atividade` = '" . $array_dados['nome_atividade'] . "', "
                    . "`status_atividade` = '" . $array_dados['status_atividade'] . "', "
                    . "`id_projeto` = '" . $array_dados['id_projeto'] . "', "
                    . "`data_inicio_atividade` = '" . $array_dados['data_inicio_atividade'] . "', "
                    . "`data_fim_atividade` = '" . $array_dados['data_fim_atividade'] . "', "
                    . "`data_validacao_atividade` = '" . $array_dados['data_validacao_atividade'] . "', "
                    . "`observacoes_atividade` = '" . $array_dados['observacoes_atividade'] . "' "
                    . "where id_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);     
            $log = $this->insere_log($sql,$string,tabela,$valor_atenrior,$valor_atual);
            return;
        }
    }
/**
 * @name Excluir atividade
 * @Funcionalidade Recebe o id da informação que será excluida do banco
 * @param inteiro $id
 * @return null
 */
    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `atividade` WHERE id_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();          
            $log = $this->insere_log($sql,$string,tabela, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }
/**
 * @name Get Unico
 * @Funcionalidade Obtem os dados de um único cadastro e retorna um array para o controller
 * @param inteiro $id
 * @return Array
 */
    public function getUnico($id) {
        $array = array();
        $sql = $this->db->prepare("select * from atividade WHERE id_atividade = " . $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    /**
     * @name Get Projeto
     * @Funcionalidade obtem todos projetos cadastrados no sistema
     * @return array
     */
    public function getProjeto() {
        $array = array();
        $sql = $this->db->prepare("select * from projeto");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getStringLog($id) {
        $resultado = $this->getUnico($id);
        extract($resultado['0']);
        return $valor = 'id = '.$id_atividade.
                          ' nome = '.$nome_atividade.
                          ' status = '.$status_atividade.
                          ' id projeto = '.$id_projeto.
                          ' data inicio = '.$data_inicio_atividade.
                          ' data fim = '.$data_fim_atividade.
                          ' data validacao = '.$data_validacao_atividade.
                          ' observacoes = '.$observacoes_atividade;
    }

}
