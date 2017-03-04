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
class pmbok extends model {
   
public function getLista() {
    
   
    $array = array();

    $sql = $this->db->prepare("select * from pmbok_versao");
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    
    return $array;
}

public function add_pmbok ($array_dados = array()){
    if(count($array_dados)>1){ 
        
        $sql = $this->db->prepare("INSERT INTO `pmbok_versao`(`descricao_pmbok_versao`) VALUES ('".$array_dados['descricao_pmbok']."')");
        $sql->execute();
        return;
    }
  
}

public function alterar_pmbok ($array_dados = array(), $id){
    if(count($array_dados)>1){  
        $sql = $this->db->prepare("update `pmbok_versao` set `descricao_pmbok_versao` = '".$array_dados['descricao_pmbok']."' where id_pmbok_versao = ".$id);
        $sql->execute();
        return;
    }
  
}

public function excluir($id) {
    if(isset($id)){
        $sql = $this->db->prepare("DELETE FROM `pmbok_versao` WHERE id_pmbok_versao = ".$id);
        $sql->execute();
        return;
    }
}

public function getUnico($id) {
    
   
    $array = array();

    $sql = $this->db->prepare("select * from pmbok_versao WHERE id_pmbok_versao = ".$id);
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    return $array;
}

}

