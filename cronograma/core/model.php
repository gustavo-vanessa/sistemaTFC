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
    


}
