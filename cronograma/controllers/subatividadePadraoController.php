//  <?php
/**
 * Description of atividadePadraoController
 *
 * @author Gustavo Martins
 */
class subatividadePadraoController extends controller {

    public function index() {
        $subatividadesPadroes = new subatividadePadrao();
        $dados['subatividadesPadroes'] = $subatividadesPadroes->getLista();
        $this->loadTemplate('subatividadePadrao/subatividadePadrao', $dados);
    }

    public function excluir($id) {
        $subatividadesPadroes = new subatividadePadrao();
        $subatividadesPadroes->excluir($id);
        $this->index();
    }

    public function formAlterar($id) {
        $subatividadesPadroes = new subatividadePadrao();
        $dados['subatividadesPadroes'] = $subatividadesPadroes->getUnico($id);
        $dados['atividadePadrao'] = $subatividadesPadroes->getAtividadePadrao();
        $this->loadTemplate('subatividadePadrao/formSubatividadePadraoUpdate', $dados);
    }

    public function add() {
        $subatividadesPadroes = new subatividadePadrao();
        $subatividadesPadroes->add_subatividades_padroes($_POST);
        $this->index();
    }
    
     public function form_add() {
        $subatividadesPadroes = new subatividadePadrao();
        $dados ['atividadesPadroes'] = $subatividadesPadroes->getAtividadePadrao();
        $this->loadTemplate('subatividadePadrao/formSubatividadePadrao', $dados);
    }
    
    public function alterar($id) {
       $subatividadesPadroes = new subatividadePadrao();
       $subatividadesPadroes->alterar_atividades_padroes($_POST, $id);
       $this->index(); 
        
    }

}