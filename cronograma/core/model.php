<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author Gustavo Martins
 */
class model {

    public $db;

    public function __construct() {
        try {
            global $config;
            $this->db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=" . $config['host'], $config['dbuser'], $config['dbpass']);

            //    $this->db->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
        } catch (Exception $e) {
            //echo "Erro de conexão: " . htmlentities($e->getMessage(),  ENT_QUOTES,  "utf-8") . "<p>";
        }
    }

    public function insere_log($sql, $string, $tabela, $valor_anterior, $valor_atual) {
        if ($sql) {
            $teste = substr($string, (strpos($string, '`status_projeto` =') + 19), 3);
//            print_r($sql);
//            exit;

            $erroCod = 'Codigo Retornado: ' . $sql->errorInfo()[0];
            
            IF ($sql->errorInfo()[0] == '00000') {
                $erroMsg = 'Mensagem retornada: Sucesso';
                $erro = $erroCod . ' ' . $erroMsg;
                $log = "INSERT INTO `log` (`data_log`, `id_usuario`, `comando_realizado_log`, `valor_anterior_log`, `valor_atual_log`, `tabela_alteracao_log`, `erro_log`) "
                        . "VALUES (LOCALTIME(), " . $_SESSION['id_usuario'] . ",'" . addslashes($string) . "','" . addslashes($valor_anterior) . "','" . addslashes($valor_atual) . "','" . addslashes($tabela) . "','" . addslashes($erro) . "')";

                $sqlLog = $this->db->prepare($log);
                $sqlLog->execute();
                if($teste == "'F'") {
                    $ret['id'] = 0;
                    $ret['msg'] = 'Parabens! O projeto foi finalizado com sucesso';
                } else {
                    $ret['id'] = 0;
                    $ret['msg'] = 'Excluido com sucesso';
                }
                return $ret;
            } else {
                $erroMsg = 'Mensagem retornada: ' . $sql->errorInfo()[2];
                $erro = $erroCod . ' ' . $erroMsg;
                $log = "INSERT INTO `log` (`data_log`, `id_usuario`, `comando_realizado_log`, `tabela_alteracao_log`, `erro_log`) VALUES (LOCALTIME(),  " . $_SESSION['id_usuario'] . ",'" . addslashes($string) . "','" . addslashes($tabela) . "','" . addslashes($erro) . "')";

                $sqlLog = $this->db->prepare($log);
                $sqlLog->execute();
                $ret['id'] = 1;
                $ret['msg'] = 'Não foi possivel realizar a exclusão, há outro registros que dependem deste.';
                return $ret;
            }
        }
    }

}
