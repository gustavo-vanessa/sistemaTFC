<?php

/**
 * Description of usuariosController
 *
 * @author Gustavo Martins
 */
class perfilController extends controller {

    public function index() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {

            header('Location: /cronograma');
        } else {
            $perfis = new perfil();
            $dados['perfis'] = $perfis->getLista();
            $this->loadTemplate('perfil/perfil', $dados);
        }
    }

    public function formAlterar($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $perfis = new perfil();
            $dados['perfis'] = $perfis->getUnico($id);
            $this->loadTemplate('perfil/formperfilUpdate', $dados);
        }
    }

    public function relatorio() {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {

            header('Location: /cronograma');
        } else {
            $perfis = new perfil();
            $dados['perfis'] = $perfis->getLista();
            $pdf = new PDF();
            $header = array('Codigo', 'Nome', 'Descricao');
            $pdf->SetFont('Arial', '', 14);
            $pdf->AddPage();
            $pdf->tabelaPerfil($header, $dados['perfis']);
            $pdf->Output();
        }
    }

}
