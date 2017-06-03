<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("LOG_PROJETO", "Projeto");
/**
 * Description of projeto
 *
 * @author Gustavo Martins
 */
class projeto extends model {
 public $valor_atenrior = null;
    public $valor_atual = null;
    
    
    /**
     * 
     * Consultas SQL
     */
    public function getLista() {
        $array = array();
        $string = "SELECT p.id_projeto,
                                          p.nome_projeto,
                                          case 
                                            when p.status_projeto = 'AP' then 'Aprovado TFC I'
                                            when p.status_projeto  = 'A' then 'Atrasado'
                                            when p.status_projeto  = 'EP' then 'Em Progresso'
                                            when p.status_projeto  = 'F' then 'Finalizado'
                                            when p.status_projeto  = 'IN' then 'Iniciado'
                                            else ''
					  end as status_projeto, 
                                          DATE_FORMAT(p.data_validacao,'%d / %m / %Y')data_validacao,
                                          p.id_orientador,
                                          obter_nome_orientador (p.id_orientador) as nome_orientador,
                                          p.id_orientando,
                                          obter_nome_orientando (p.id_orientando) as nome_orientando,
                                          id_pmbok_versao,
                                          obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                   FROM projeto p
                                   order by id_projeto desc";
        $sql = $this->db->prepare($string);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getListaCoordenadorFiltro($id_orientador= null ,$id_orientando = null) {
        $array = array();
        $string = "SELECT p.id_projeto,
                                          p.nome_projeto,
                                          case 
                                            when p.status_projeto = 'AP' then 'Aprovado TFC I'
                                            when p.status_projeto  = 'A' then 'Atrasado'
                                            when p.status_projeto  = 'EP' then 'Em Progresso'
                                            when p.status_projeto  = 'F' then 'Finalizado'
                                            when p.status_projeto  = 'IN' then 'Iniciado'
                                            else ''
					  end as status_projeto, 
                                          DATE_FORMAT(p.data_validacao,'%d / %m / %Y')data_validacao,
                                          p.id_orientador,
                                          obter_nome_orientador (p.id_orientador) as nome_orientador,
                                          p.id_orientando,
                                          obter_nome_orientando (p.id_orientando) as nome_orientando,
                                          id_pmbok_versao,
                                          obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                   FROM projeto p
                                   where 1=1
                                   and id_orientador = ifnull(nullif(".$id_orientador.",0), id_orientador)
                                   and id_orientando = ifnull(nullif(".$id_orientando.",0), id_orientando)
                                   order by id_projeto desc";
        
        $sql = $this->db->prepare($string);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    
        public function getListaOrientadorFiltro($id_orientando = null) {
        $array = array();
        $string = "SELECT p.id_projeto,
                                          p.nome_projeto,
                                          case 
                                            when p.status_projeto = 'AP' then 'Aprovado TFC I'
                                            when p.status_projeto  = 'A' then 'Atrasado'
                                            when p.status_projeto  = 'EP' then 'Em Progresso'
                                            when p.status_projeto  = 'F' then 'Finalizado'
                                            when p.status_projeto  = 'IN' then 'Iniciado'
                                            else ''
					  end as status_projeto, 
                                          DATE_FORMAT(p.data_validacao,'%d / %m / %Y')data_validacao,
                                          p.id_orientador,
                                          obter_nome_orientador (p.id_orientador) as nome_orientador,
                                          p.id_orientando,
                                          obter_nome_orientando (p.id_orientando) as nome_orientando,
                                          id_pmbok_versao,
                                          obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                   FROM projeto p
                                   where 1=1
                                   and id_orientador = ifnull(".$_SESSION['id_usuario'].", id_orientador)
                                   and id_orientando = ifnull(".$id_orientando.", id_orientando)
                                   order by id_projeto desc";
        $sql = $this->db->prepare($string);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
        public function getListaOrientador() {
        $array = array();
//        print_r($_SESSION);
            $string = "SELECT p.id_projeto,
                                              p.nome_projeto,
                                              case 
                                                when p.status_projeto = 'AP' then 'Aprovado TFC I'
                                                when p.status_projeto  = 'A' then 'Atrasado'
                                                when p.status_projeto  = 'EP' then 'Em Progresso'
                                                when p.status_projeto  = 'F' then 'Finalizado'
                                                when p.status_projeto  = 'IN' then 'Iniciado'
                                                else ''
                                              end as status_projeto,
                                              DATE_FORMAT(p.data_validacao,'%d / %m / %Y')data_validacao,
                                              p.id_orientador,
                                              obter_nome_orientador (p.id_orientador) as nome_orientador,
                                              p.id_orientando,
                                              obter_nome_orientando (p.id_orientando) as nome_orientando,
                                              id_pmbok_versao,
                                              obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                       FROM projeto p
                                       WHERE p.id_orientador = ".$_SESSION['id_usuario'];
        $sql = $this->db->prepare($string);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
//        print_r($array);
//        exit;
        return $array;
    }
    
            public function getListaOrientando() {
        $array = array();
        $string = "SELECT p.id_projeto,
                                          p.nome_projeto,
                                          case 
                                            when p.status_projeto = 'AP' then 'Aprovado TFC I'
                                            when p.status_projeto  = 'A' then 'Atrasado'
                                            when p.status_projeto  = 'EP' then 'Em Progresso'
                                            when p.status_projeto  = 'F' then 'Finalizado'
                                            when p.status_projeto  = 'IN' then 'Iniciado'
                                            else ''
					  end as status_projeto,
                                          DATE_FORMAT(p.data_validacao,'%d / %m / %Y')data_validacao,
                                          p.id_orientador,
                                          obter_nome_orientador (p.id_orientador) as nome_orientador,
                                          p.id_orientando,
                                          obter_nome_orientando (p.id_orientando) as nome_orientando,
                                          id_pmbok_versao,
                                          obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                   FROM projeto p
                                   WHERE p.id_orientando = ". $_SESSION['id_usuario'];        
        $sql = $this->db->prepare($string);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    
    public function getUnico($id) {
        $array = array();
        $sql = $this->db->prepare("SELECT p.id_projeto,
                                          p.nome_projeto,
                                          case 
                                            when p.status_projeto = 'AP' then 'Aprovado TFC I'
                                            when p.status_projeto  = 'A' then 'Atrasado'
                                            when p.status_projeto  = 'EP' then 'Em Progresso'
                                            when p.status_projeto  = 'F' then 'Finalizado'
                                            when p.status_projeto  = 'IN' then 'Iniciado'
                                            else ''
					  end as status_projeto,
                                          DATE_FORMAT(p.data_validacao,'%d / %m / %Y')data_validacao,
                                          p.id_orientador,
                                          obter_nome_orientador (p.id_orientador) as nome_orientador,
                                          p.id_orientando,
                                          obter_nome_orientando (p.id_orientando) as nome_orientando,
                                          id_pmbok_versao,
                                          obter_desc_pmbok (p.id_pmbok_versao) as desc_pmbok
                                   FROM projeto p
                                   WHERE id_projeto = " . $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getOrientador() {
        $array = array();

        $sql = $this->db->prepare("select u.id_usuario, u.nome_usuario 
                                   from usuario u, perfil_do_usuario pu 
                                   where u.id_usuario = pu.usuario_id_usuario
                                   and pu.perfil_id_perfil = 1");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getOrientando() {
        $array = array();

        $sql = $this->db->prepare("select u.id_usuario, u.nome_usuario 
                                   from usuario u, perfil_do_usuario pu 
                                   where u.id_usuario = pu.usuario_id_usuario 
                                   and pu.perfil_id_perfil = 2");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getPmbok() {
        $array = array();
        $sql = $this->db->prepare("select * from pmbok_versao");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getStringLog($id) {
        $resultado = $this->getUnico($id);
        extract($resultado['0']);
        return $valor = 'id = '.$id_projeto.
                          ' nome = '.$nome_projeto.
                          ' status = '.$status_projeto.
                          ' data validacao = '.$data_validacao.
                          ' id orientador = '.$id_orientador.
                          ' id orientando = '.$id_orientando.
                          ' id pmbok = '.$id_pmbok_versao;
    }
    
    public function getProjetosUsuario($id_usuario) {
        $array = array();
        $string = "select * from projeto where id_orientando = ".$id_usuario. " or id_orientador = ".$id_usuario;
        $sql = $this->db->prepare($string);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        if (count($array)>0){
            return 1; 
        }
        else {
            return 0;
        }
    }

    /**
     * 
     * inclusao de projetos no banco
     * 
     */
    public function add_projeto($array_dados = array()) {
        if (count($array_dados) > 1) {
            $string = "INSERT INTO`projeto` (`nome_projeto`, `status_projeto`, `id_orientador`, `id_orientando`, `id_pmbok_versao`) VALUES ('". $array_dados['nome_projeto'] . "', '" . $array_dados['status_projeto'] . "', '". $array_dados['id_orientador'] . "', '" . $array_dados['id_orientando'] . "', '" . $array_dados['id_pmbok_versao'] . "')";
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,LOG_PROJETO, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }

    /**
     * 
     * alteração de projetos no banco
     * 
     */
    
    public function alterar_projeto($id, $array_dados = array()) {
        $valor_anterior = $this->getStringLog($id);
        if (count($array_dados) > 0) {
            $string = "update `projeto` set `nome_projeto` = '" . $array_dados['nome_projeto'] . "', `status_projeto` = '" . $array_dados['status_projeto'] . "', `id_orientador` = '" . $array_dados['id_orientador'] . "', `id_orientando` = '" . $array_dados['id_orientando']."' where id_projeto = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);     
            $log = $this->insere_log($sql,$string,LOG_PROJETO,$valor_anterior,$valor_atual);
            return;
        }
    }
    
    
        public function validar_projeto($id) {
        $valor_anterior = $this->getStringLog($id);
        if (count($id) > 0) {
            $string = "update `projeto` set  `data_validacao` = sysdate() where id_projeto = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $valor_atual = $this->getStringLog($id);     
            $log = $this->insere_log($sql,$string,LOG_PROJETO,$valor_anterior,$valor_atual);
            return;
        }
    }
    
    /**
     * 
     * exclusao de projetos no banco
     * 
     */
    

    public function excluir($id) {
        if (isset($id)) {
            $string = "DELETE FROM `projeto` WHERE id_projeto = " . $id;
            $sql = $this->db->prepare($string);
            $sql->execute();
            $log = $this->insere_log($sql,$string,LOG_PROJETO, $this->valor_atenrior, $this->valor_atual);
            return;
        }
    }


    
    
}
