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
class login extends model {

    public function usuario($login, $senha) {


        $array = array();
        $string = "SELECT *, obter_nome_perfil(perfil_id_perfil) nome_perfil 
                                    FROM usuario u, perfil_do_usuario pu
                                    where pu.usuario_id_usuario = u.id_usuario
                                    and u.login_usuario = '". $login
                                  ."' and u.senha_usuario = '". $senha."'";
       
        $sql = $this->db->prepare($string);
        $sql->execute();


        if ($sql->rowCount() > 0) {

            $array = $sql->fetchAll();
        }
        return $array;
        
    }

}
