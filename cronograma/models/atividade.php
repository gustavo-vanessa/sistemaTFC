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
                                          case 
                                            when status_atividade = 'NE' then 'Não Executada'
                                            when status_atividade = 'E' then 'Executada'
                                            else ''
					  end as status_atividade, 
                                          id_projeto, 
                                          obter_nome_projeto(id_projeto, id_atividade) as nome_projeto, 
                                          DATE_FORMAT(data_inicio_atividade,'%d / %m / %Y')data_inicio_atividade, 
                                          DATE_FORMAT(data_fim_atividade,'%d / %m / %Y')data_fim_atividade, 
                                          DATE_FORMAT(data_validacao_atividade,'%d / %m / %Y')data_validacao_atividade, 
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
        $sql = $this->db->prepare("select a.id_atividade, 
                                          a.nome_atividade, 
                                          case 
                                            when a.status_atividade = 'NE' then 'Não Executada'
                                            when a.status_atividade = 'E' then 'Executada'
                                            else ''
					  end as status_atividade, 
                                          a.id_projeto,
                                          p.data_validacao,
                                          obter_nome_projeto(a.id_projeto, a.id_atividade) as nome_projeto, 
                                          DATE_FORMAT(a.data_inicio_atividade,'%d / %m / %Y')data_inicio_atividade, 
                                          DATE_FORMAT(a.data_fim_atividade,'%d / %m / %Y')data_fim_atividade, 
                                          DATE_FORMAT(a.data_validacao_atividade,'%d / %m / %Y')data_validacao_atividade, 
                                          a.observacoes_atividade 
                                   from atividade a, projeto p
                                   where a.id_projeto = p.id_projeto
                                   and a.id_projeto = ".$id_projeto);
        $sql->execute();

        if ($sql) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function listaAtividadesProjetoGantt($id_projeto) {
        $array = array();
        $sql = $this->db->prepare("select id_atividade, 
                                          nome_atividade, 
                                          case 
                                            when status_atividade = 'NE' then 'Não Executada'
                                            when status_atividade = 'E' then 'Executada'
                                            else ''
					  end as status_atividade, 
                                          id_projeto, 
                                          obter_nome_projeto(id_projeto, id_atividade) as nome_projeto, 
                                          data_inicio_atividade data_inicio_atividade, 
                                          data_fim_atividade data_fim_atividade, 
                                          data_validacao_atividade data_validacao_atividade, 
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
                    . "`observacoes_atividade`) "
                    . "VALUES ('" . $array_dados['nome_atividade'] . "',"
                    . "'NE',"
                    . "'" . $array_dados['id_projeto'] . "',"
                    . "'" . $array_dados['data_inicio_atividade'] . "',"
                    . "'" . $array_dados['data_fim_atividade'] . "',"
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
    public function alterar_atividades($id, $array_dados = array()) {
        $valor_atenrior = $this->getStringLog($id);                 
        if (count($array_dados) > 1) {
            $string = "update `atividade` "
                    . "set `nome_atividade` = '" . $array_dados['nome_atividade'] . "', "
                    . "`data_inicio_atividade` = '" . $array_dados['data_inicio_atividade'] . "', "
                    . "`data_fim_atividade` = '" . $array_dados['data_fim_atividade'] . "', "
                    . "`observacoes_atividade` = '" . $array_dados['observacoes_atividade'] . "' "
                    . "where id_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);     
            $log = $this->insere_log($sql,$string,tabela,$valor_atenrior,$valor_atual);
            return;
        }
    }
    
            public function executar_atividades($id) {
        $valor_anterior = $this->getStringLog($id);
        if (count($id) > 0) {
          $string = "update `atividade` "
                    . "set `status_atividade` = 'E' "
                    . "where id_atividade = " . $id;
          $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $log = $this->insere_log($sql,$string,tabela,$valor_anterior,$valor_atual);
            return;
        }
    }
    
            public function validar_execucao($id) {
        $valor_anterior = $this->getStringLog($id);
        if (count($id) > 0) {
          $string = "update `atividade` "
                    . "set `data_validacao_atividade` = sysdate() "
                    . "where id_atividade = " . $id;
          $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $log = $this->insere_log($sql,$string,tabela,$valor_anterior,$valor_atual);
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
    
    
     public function getUltimo() {
        $array = array();
        $sql = $this->db->prepare("SELECT max(id_atividade) id_atividade from atividade");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    
        public function getProjetoAtividade($id) {
        $array = array();
        $sql = $this->db->prepare("select id_projeto from atividade WHERE id_atividade = " . $id);
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
    public function getProjetoOrientando() {
        $array = array();
        $sql = $this->db->prepare("select * from projeto where id_orientando = ".$_SESSION['id_usuario']);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
        public function getProjetoOrientador() {
        $array = array();
        $sql = $this->db->prepare("select * from projeto where id_orientador = ".$_SESSION['id_usuario']);
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
