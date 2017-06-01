//  <?php

/**
 * Description of atividadePadraoController
 *
 * @author Gustavo Martins
 */
class subatividadePadraoController extends controller {

    public function index() {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividadesPadroes = new subatividadePadrao();
            $dados['subatividadesPadroes'] = $subatividadesPadroes->getLista();
            $this->loadTemplate('subatividadePadrao/subatividadePadrao', $dados);
        }
    }

    public function excluir($id) {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividadesPadroes = new subatividadePadrao();
            $subatividadesPadroes->excluir($id);
            header('Location: /cronograma/subatividadePadrao');
        }
    }

    public function formAlterar($id) {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividadesPadroes = new subatividadePadrao();
            $dados['subatividadesPadroes'] = $subatividadesPadroes->getUnico($id);
            $dados['atividadesPadroes'] = $subatividadesPadroes->getAtividadePadrao();
            $this->loadTemplate('subatividadePadrao/formSubatividadePadraoUpdate', $dados);
        }
    }

    public function add() {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividadesPadroes = new subatividadePadrao();
            $subatividadesPadroes->add_subatividades_padroes($_POST);
            header('Location: /cronograma/subatividadePadrao');
        }
    }

    public function form_add() {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividadesPadroes = new subatividadePadrao();
            $dados ['atividadesPadroes'] = $subatividadesPadroes->getAtividadePadrao();
            $this->loadTemplate('subatividadePadrao/formSubatividadePadrao', $dados);
        }
    }

    public function alterar($id) {
        if(!isset($_SESSION))     {         session_start();     }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividadesPadroes = new subatividadePadrao();
            $subatividadesPadroes->alterar_subatividades_padroes($_POST, $id);
            header('Location: /cronograma/subatividadePadrao');
        }
    }


    
}
