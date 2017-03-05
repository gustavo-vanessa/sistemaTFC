<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("TABELA","Usuario");
/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class usuario extends model {
     public $valor_atenrior = null;
    public $valor_atual = null;
   
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
        $string = "INSERT INTO `usuario`(`nome_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`) VALUES ('".$array_dados['nome_usuario']."','".$array_dados['login_usuario']."','".$array_dados['Password_usuario']."','".$array_dados['Email_usuario']."')";
        $sql = $this->db->prepare($string);
        $sql->execute();
        $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
        return;
    }
  
}

public function alterar_usuario ($array_dados = array(), $id){
    $valor_anterior = $this->getStringLog($id);
    if(count($array_dados)>1){  
        $string = "update `usuario` set `nome_usuario` = '".$array_dados['nome_usuario']."', `login_usuario` = '".$array_dados['login_usuario']."', `senha_usuario` = '".$array_dados['Password_usuario']."', `email_usuario` = '".$array_dados['Email_usuario']."' where id_usuario = ".$id;
        $sql = $this->db->prepare($string);
        $sql->execute();
        $valor_atual = $this->getStringLog($id);     
            $log = $this->insere_log($sql,$string,TABELA,$valor_anterior,$valor_atual);
        return;
    }
  
}

public function excluir($id) {
    if(isset($id)){
        $string = "DELETE FROM `usuario` WHERE id_usuario = ".$id;
        $sql = $this->db->prepare($string);
        $sql->execute();
        $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
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

public function getStringLog($id) {
        $resultado = $this->getUnico($id);
        extract($resultado['0']);
        return $valor = 'id = '.$id_usuario.
                          ' nome = '.$nome_usuario.
                          ' login = '.$login_usuario.
                          ' senha = '.$senha_usuario.
                          ' email = '.$email_usuario.
                          ' TFC = '.$tfc_usuario;
    }

}

