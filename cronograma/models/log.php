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
class log extends model {
    
    
public function getLista() {
    
   
    $array = array();

    $sql = $this->db->prepare("SELECT l.id_log,
	   l.data_log,
       l.valor_anterior_log,
       l.valor_atual_log,
       l.id_usuario,
       obter_nome_usuario(l.id_usuario) nome_usuario,
       l.comando_realizado_log,
       l.tabela_alteracao_log,
       l.erro_log
FROM log l ");
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    return $array;
}

public function getUnico($id) {
    
   
    $array = array();

    $sql = $this->db->prepare("SELECT l.id_log,
	   l.data_log,
       l.valor_anterior_log,
       l.valor_atual_log,
       l.id_usuario,
       obter_nome_usuario(l.id_usuario) nome_usuario,
       l.comando_realizado_log,
       l.tabela_alteracao_log,
       l.erro_log
FROM log l
WHERE id_log = ".$id);
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    return $array;
}

}

