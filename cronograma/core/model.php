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
            //echo "mysql:dbname=" . $config['dbname'] . ";host=" . $config['host'], $config['dbuser'], $config['dbpass']."</br></br></br></br></br>";
            $this->db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=" . $config['host'], $config['dbuser'], $config['dbpass']);
            
           //    $this->db->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
        } catch (Exception $e) {
            echo "Erro de conexão: " . $e->getMessage() . "<p>";
            
        }
    }
    
    public function insere_log($sql,$string,$tabela,$valor_anterior, $valor_atual) {
        if ($sql) {
                $erroCod = 'Codigo Retornado: ' . $sql->errorInfo()[0];
                IF ($sql->errorInfo()[0] === '00000') {
                    $erroMsg = 'Mensagem retornada: Sucesso';
                    $erro = $erroCod . ' ' . $erroMsg;
                    $log = "INSERT INTO `log` (`data_log`, `id_usuario`, `comando_realizado_log`, `valor_anterior_log`, `valor_atual_log`, `tabela_alteracao_log`, `erro_log`) "
                                    . "VALUES (LOCALTIME(), '".$_SESSION['nome_usuario']."','" . addslashes($string) . "','".$valor_anterior."','".$valor_atual."','".$tabela."','" . $erro . "')";
                    $sqlLog = $this->db->prepare($log);
                    $sqlLog->execute();
                    return 1;
                } else {
                    $erroMsg = 'Mensagem retornada: ' . $sql->errorInfo()[2];
                    $erro = $erroCod . ' ' . $erroMsg;
                    $log = "INSERT INTO `log` (`data_log`, `id_usuario`, `comando_realizado_log`, `tabela_alteracao_log`, `erro_log`) VALUES (LOCALTIME(), '3','" . addslashes($string) . "','".$tabela."','" . $erro . "')";
                    $sqlLog = $this->db->prepare($log);
                    $sqlLog->execute();
                    return 0;
                }
            }
    }
    


}
