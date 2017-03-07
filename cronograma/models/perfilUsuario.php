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

    /**
     * @name Adicionar Atividades
     * @param Array $array_dados
     * @funcionalidade Recebe um array de dados do controller e atribui os dados a string que será executada no banco da dados, após isso chama a função para inserção na tabela de log
     * @return type null
     */
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

    /**
     * @name Excluir atividade
     * @Funcionalidade Recebe o id da informação que será excluida do banco
     * @param inteiro $id
     * @return null
     */
    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `perfil_do_usuario` WHERE usuario_id_usuario = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql, $string, TABELA_LOG, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

}
