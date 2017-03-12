<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("TABELA_LOG", "Perfil_do_Usuario");

/**
 * Description of usuario
 *
 * @author Gustavo Martins
 */
class perfilUsuario extends model {

    public $valor_atenrior = null;
    public $valor_atual = null;

    public function add_perfil_usuario($array_dados = array()) {
        if (count($array_dados) > 1) {
            $string = "INSERT INTO `perfil_do_usuario`"
                    . "(`perfil_id_perfil`, "
                    . "`usuario_id_usuario` )"
                    . "VALUES ('" . $array_dados['id_perfil'] . "',"
                    . "'" . $array_dados['id_usuario'] . "')";
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql, $string, TABELA_LOG, $this->valor_atenrior, $this->valor_atual);
        }
    }

    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql, $string, TABELA_LOG, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    public function getUnico($id) {
        if (isset($id)) {
            $array = array();
            $string = "SELECT *
                        FROM perfil p
                        left join perfil_do_usuario pu
                        on p.id_perfil = pu.perfil_id_perfil
                        and pu.usuario_id_usuario = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
            return $array;
        }
    }

}
