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
                                          case 
                                            when status_sub_atividade = 'NE' then 'Não Executada'
                                            when status_sub_atividade = 'E' then 'Executada'
                                            when status_sub_atividade = 'EA' then 'Executada em Atraso'
                                            when status_sub_atividade = 'A' then 'Atraso'
                                            when status_sub_atividade = 'F' then 'Validada'
                                            when status_sub_atividade = 'FA' then 'Validada em Atraso'
                                            else ''
					  end as status_sub_atividade,
                                          id_atividade, 
                                          obter_nome_atividade(id_atividade, id_sub_atividade) as nome_atividade, 
                                          DATE_FORMAT(data_inicio_sub_atividade,'%d / %m / %Y')data_inicio_sub_atividade, 
                                          DATE_FORMAT(data_fim_sub_atividade,'%d / %m / %Y')data_fim_sub_atividade, 
                                          DATE_FORMAT(data_validacao_sub_atividade,'%d / %m / %Y')data_validacao_sub_atividade, 
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
                                          nome_sub_atividade,case 
                                            when status_sub_atividade = 'NE' then 'Não Executada'
                                            when status_sub_atividade = 'E' then 'Executada'
                                            when status_sub_atividade = 'EA' then 'Executada em Atraso'
                                            when status_sub_atividade = 'A' then 'Atraso'
                                            when status_sub_atividade = 'F' then 'Validada'
                                            when status_sub_atividade = 'FA' then 'Validada em Atraso'
                                            else ''
					  end as status_sub_atividade,
                                          id_atividade, 
                                          obter_nome_atividade(id_atividade, id_sub_atividade) as nome_atividade, 
                                          DATE_FORMAT(data_inicio_sub_atividade,'%d / %m / %Y')data_inicio_sub_atividade, 
                                          DATE_FORMAT(data_fim_sub_atividade,'%d / %m / %Y')data_fim_sub_atividade, 
                                          DATE_FORMAT(data_validacao_sub_atividade,'%d / %m / %Y')data_validacao_sub_atividade, 
                                          observacoes_sub_atividade 
                                   from sub_atividade
                                   where id_atividade = " . $id_atividade);
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
                    . "`data_fim_sub_atividade` ) "
                    . "VALUES ('" . $array_dados['nome_sub_atividade'] . "',"
                    . "'NE',"
                    . "'" . $array_dados['id_atividade'] . "',"
                    . "'" . $array_dados['data_inicio_sub_atividade'] . "',"
                    . "'" . $array_dados['data_fim_sub_atividade'] . "')";

            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql, $string, TABELA, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    public function alterar_subatividades($id, $array_dados = array()) {
        $valor_anterior = $this->getStringLog($id);

        if (count($array_dados) > 1) {
            $string = "update `sub_atividade` "
                    . "set `nome_sub_atividade` = '" . $array_dados['nome_sub_atividade'] . "', "
                    . "`id_atividade` = '" . $array_dados['id_atividade'] . "', "
                    . "`data_inicio_sub_atividade` = '" . $array_dados['data_inicio_sub_atividade'] . "', "
                    . "`data_fim_sub_atividade` = '" . $array_dados['data_fim_sub_atividade'] . "' "
                    . "where id_sub_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
            return;
        }
    }

    public function alterar_observacao($id, $array_dados = array()) {
        $valor_anterior = $this->getStringLog($id);
        $array_dados = str_replace("<br />", "", $array_dados);
        if (count($array_dados) >= 1) {
            $string = "update `sub_atividade` "
                    . "set `observacoes_sub_atividade` = '" . $array_dados . "' "
                    . "where id_sub_atividade = " . $id;

            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
            return;
        }
    }

    public function executar_subatividades($id) {
        $valor_anterior = $this->getStringLog($id);
        $Emdia = $this->getEmDias($id);
        if (strtotime(date('Y-m-d')) < strtotime($Emdia[0]['data_fim_sub_atividade'])) {
            if (strtotime(date('Y-m-d')) < strtotime($Emdia[0]['data_inicio_sub_atividade'])) {
                if (count($id) > 0) {
                    $string = "update `sub_atividade` "
                            . "set `status_sub_atividade` = 'E' "
                            . ",`data_inicio_sub_atividade` = sysdate()"
                            . "where id_sub_atividade = " . $id;
                    $sql = $this->db->prepare($string);
                    $sql->execute();
                    $valor_atual = $this->getStringLog($id);
                    $log = $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
                    return;
                }
            } else {
                if (count($id) > 0) {
                    $string = "update `sub_atividade` "
                            . "set `status_sub_atividade` = 'E' "
                            . "where id_sub_atividade = " . $id;
                    $sql = $this->db->prepare($string);
                    $sql->execute();
                    $valor_atual = $this->getStringLog($id);
                    $log = $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
                    return;
                }
            }
        } else {
            $string = "update `sub_atividade` "
                    . "set `status_sub_atividade` = 'EA' "
                    . "where id_sub_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $log = $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
            return;
        }
    }

    public function verificaStatus() {
        $array = array();
        $sql = $this->db->prepare("select id_sub_atividade, status_sub_atividade, data_fim_sub_atividade from sub_atividade");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        foreach ($array as $sub) {

            $Emdia = $this->getEmDias($sub['id_sub_atividade']);
            if ($sub['status_sub_atividade'] === 'EA') {
                
            } elseif ($sub['status_sub_atividade'] === 'E') {
                
            } else {
                if (!isset($Emdia[0]['data_validacao_sub_atividade'])) {
                    if (strtotime(date('Y-m-d')) < strtotime($Emdia[0]['data_fim_sub_atividade'])) {

                        $string = "update `sub_atividade` "
                                . "set `status_sub_atividade` = 'NE' "
                                . "where id_sub_atividade = " . $sub['id_sub_atividade'];
                        $sql = $this->db->prepare($string);
                        $sql->execute();
                        //    $valor_atual = $this->getStringLog($id);
                        //  $log = $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
                    } else {
                        $string = "update `sub_atividade` "
                                . "set `status_sub_atividade` = 'A' "
                                . "where id_sub_atividade = " . $sub['id_sub_atividade'];
                        $sql = $this->db->prepare($string);
                        $sql->execute();
                        //$valor_atual = $this->getStringLog($id);
                        //$log = $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
                    }
                }
            }
        }
        return;
    }

    public function getEmDias($id) {
        $array = array();
        $sql = $this->db->prepare("select data_inicio_sub_atividade, data_fim_sub_atividade, data_validacao_sub_atividade from sub_atividade WHERE id_sub_atividade = " . $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function validar_execucao($id) {
        $valor_anterior = $this->getStringLog($id);
        $verDtAnterior = $this->getEmDias($id);

        if (count($id) > 0) {
            if ($verDtAnterior[0]['data_fim_sub_atividade'] > date('Y-m-d')) {
                $string = "update `sub_atividade` "
                        . "set `data_validacao_sub_atividade` = sysdate() ,"
                        . "`data_fim_sub_atividade` = sysdate() ,"
                        . "`status_sub_atividade` = 'F' "
                        . "where id_sub_atividade = " . $id;
            } else {
                $string = "update `sub_atividade` "
                        . "set `data_validacao_sub_atividade` = sysdate() ,"
                        . "`status_sub_atividade` = 'FA' "
                        . "where id_sub_atividade = " . $id;
            }

            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $log = $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
            return;
        }
    }

    public function recusar_execucao($id) {
        $valor_anterior = $this->getStringLog($id);
        if (count($id) > 0) {
            $string = "update `sub_atividade` "
                    . "set `status_sub_atividade` = 'NE',"
                    . "`data_validacao_sub_atividade` = null "
                    . "where id_sub_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);
            $log = $this->insere_log($sql, $string, TABELA, $valor_anterior, $valor_atual);
            return;
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `sub_atividade` WHERE id_sub_atividade = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql, $string, TABELA, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    public function getProjetoSubatividade() {
        $array = array();
        $this->verificaStatus();
        $sql = $this->db->prepare("select sa.id_sub_atividade, 
                                          sa.nome_sub_atividade, 
                                          case 
                                            when sa.status_sub_atividade = 'NE' then 'Não Executada'
                                            when sa.status_sub_atividade = 'E' then 'Executada'
                                            when sa.status_sub_atividade = 'EA' then 'Executada em Atraso'
                                            when sa.status_sub_atividade = 'A' then 'Atraso'
                                            when sa.status_sub_atividade = 'F' then 'Validada'
                                            when status_sub_atividade = 'FA' then 'Validada em Atraso'
                                            else ''
					  end as status_sub_atividade, 
                                          sa.id_atividade, 
                                          obter_nome_atividade(sa.id_atividade, sa.id_sub_atividade) as nome_atividade, 
                                          DATE_FORMAT(sa.data_inicio_sub_atividade,'%d / %m / %Y')data_inicio_sub_atividade, 
                                          DATE_FORMAT(sa.data_fim_sub_atividade,'%d / %m / %Y')data_fim_sub_atividade, 
                                          DATE_FORMAT(sa.data_validacao_sub_atividade,'%d / %m / %Y')data_validacao_sub_atividade, 
                                          sa.observacoes_sub_atividade 
                                    from sub_atividade sa, atividade a
                                    where sa.id_atividade = a.id_atividade
                                    and a.id_projeto = " . $_SESSION['id_projeto']);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getProjetoSubatividadeGantt() {
        $array = array();
        $sql = $this->db->prepare("select sa.id_sub_atividade, 
                                          sa.nome_sub_atividade, 
                                          status_sub_atividade, 
                                          sa.id_atividade, 
                                          obter_nome_atividade(sa.id_atividade, sa.id_sub_atividade) as nome_atividade, 
                                          sa.data_inicio_sub_atividade data_inicio_sub_atividade, 
                                          sa.data_fim_sub_atividade data_fim_sub_atividade, 
                                          sa.data_validacao_sub_atividade data_validacao_sub_atividade, 
                                          sa.observacoes_sub_atividade 
                                    from sub_atividade sa, atividade a
                                    where sa.id_atividade = a.id_atividade
                                    and a.id_projeto = " . $_SESSION['id_projeto']);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
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

    public function getUltimo() {
        $array = array();
        $sql = $this->db->prepare("select max(id_sub_atividade)  id_subatividade from sub_atividade ");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getAtividadeUnica($id) {
        $array = array();
        $sql = $this->db->prepare("select id_atividade, nome_atividade from atividade where id_atividade = " . $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getStringLog($id) {
        $resultado = $this->getUnico($id);
        extract($resultado['0']);
        return $valor = 'id = ' . $id_sub_atividade .
                ' nome = ' . $nome_sub_atividade .
                ' status = ' . $status_sub_atividade .
                ' id atividade = ' . $id_atividade .
                ' data inicio = ' . $data_inicio_sub_atividade .
                ' data fim = ' . $data_fim_sub_atividade .
                ' data validacao = ' . $data_validacao_sub_atividade .
                ' observacoes = ' . $observacoes_sub_atividade;
    }

}
