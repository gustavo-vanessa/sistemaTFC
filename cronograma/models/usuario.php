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
class usuario extends model {
   
public function getLista() {
    
   
    $array = array();

    $sql = $this->db->prepare("select * from usuario");
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    return $array;
}

public function add_usuario ($array_dados = array()){
    if(count($array_dados)>1){  
        $sql = $this->db->prepare("INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES ('".$array_dados['nome_usuario']."','".$array_dados['login_usuario']."','".$array_dados['Password_usuario']."','".$array_dados['Email_usuario']."')");
        $sql->execute();
        return;
    }
  
}

public function alterar_usuario ($array_dados = array(), $id){
    echo 'entrei no model<br><br>';
    if(count($array_dados)>1){  
        $sql = $this->db->prepare("update `usuario` set `nome_usuario` = '".$array_dados['nome_usuario']."', `login_usuario` = '".$array_dados['login_usuario']."', `senha_usuario` = '".$array_dados['Password_usuario']."', `email_usuario` = '".$array_dados['Email_usuario']."' where id_usuario = ".$id);
        $sql->execute();
        return;
    }
  
}

public function excluir($id) {
    if(isset($id)){
        $sql = $this->db->prepare("DELETE FROM `usuario` WHERE id_usuario = ".$id);
        $sql->execute();
        return;
    }
}

public function getUnico($id) {
    
   
    $array = array();

    $sql = $this->db->prepare("select * from usuario WHERE id_usuario = ".$id);
    $sql->execute();
    
            
    if($sql->rowCount()>0) {
        
        $array = $sql->fetchAll();
    }
    return $array;
}

}

