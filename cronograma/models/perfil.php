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
class perfil extends model {
   
public function getLista() {
    
   
    $array = array();

    $sql = $this->db->prepare("select * from perfil");
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    return $array;
}

public function add_perfil ($array_dados = array()){
    if(count($array_dados)>1){ 
        
        $sql = $this->db->prepare("INSERT INTO `perfil`(`nome_perfil`, `descricao_perfil`) VALUES ('".$array_dados['nome_perfil']."','".$array_dados['descricao_perfil']."')");
        $sql->execute();
        return;
    }
  
}

public function alterar_perfil ($array_dados = array(), $id){
    echo 'entrei no model<br><br>';
    if(count($array_dados)>1){  
        $sql = $this->db->prepare("update `perfil` set `nome_perfil` = '".$array_dados['nome_perfil']."', `descricao_perfil` = '".$array_dados['descricao_perfil']."' where id_perfil = ".$id);
        $sql->execute();
        return;
    }
  
}

public function excluir($id) {
    if(isset($id)){
        $sql = $this->db->prepare("DELETE FROM `perfil` WHERE id_perfil = ".$id);
        $sql->execute();
        return;
    }
}

public function getUnico($id) {
    
   
    $array = array();

    $sql = $this->db->prepare("select * from perfil WHERE id_perfil = ".$id);
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    return $array;
}

}

