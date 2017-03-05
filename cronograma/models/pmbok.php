<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("TABELA", "Pmbok");
/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class pmbok extends model {
     public $valor_atenrior = null;
    public $valor_atual = null;
   
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
        $string = "INSERT INTO `pmbok_versao`(`descricao_pmbok_versao`) VALUES ('".$array_dados['descricao_pmbok']."')";
        $sql = $this->db->prepare($string);
        $sql->execute();
        $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
        return;
    }
  
}

public function alterar_pmbok ($array_dados = array(), $id){
        $valor_atenrior = $this->getStringLog($id);
    if(count($array_dados)>1){  
        $string = "update `pmbok_versao` set `descricao_pmbok_versao` = '".$array_dados['descricao_pmbok']."' where id_pmbok_versao = ".$id;
        $sql = $this->db->prepare($string);
        $sql->execute();
        $valor_atual = $this->getStringLog($id);
        echo '<br><br>'.$valor_atenrior.'<br><br>';
        echo '<br><br>'.$valor_atual.'<br><br>';
        $log = $this->insere_log($sql,$string,TABELA,$valor_atenrior,$valor_atual);
        return;
    }
  
}

public function excluir($id) {
    if(isset($id)){
        $string = "DELETE FROM `pmbok_versao` WHERE id_pmbok_versao = ".$id;
        $sql = $this->db->prepare($string);
        $sql->execute();
        $log = $this->insere_log($sql,$string,TABELA, $this->valor_atenrior, $this->valor_atual);
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
public function getStringLog($id) {
    $resultado = $this->getUnico($id);
       extract($resultado['0']);
         $valor = 'id = '.$id_pmbok_versao.
                          ' nome = '.$descricao_pmbok_versao;
               return $valor;
               
}
}

