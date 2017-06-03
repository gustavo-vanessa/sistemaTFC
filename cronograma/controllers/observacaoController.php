<?php

/**
 * Description of atividadeController
 *
 * @author Gustavo Martins
 */
class observacaoController extends controller {

    public function index() {

        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $subatividades->verificaStatus();
            $dados['subatividades'] = $subatividades->getLista();
            $this->loadTemplate('subatividade/formObservacao', $dados);
        }
    }

    public function formAlterar($id) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $subatividades = new subatividade();
            $dados['subatividades'] = $subatividades->getUnico($id);
            $this->loadTemplate('subatividade/formObservacao', $dados);
        }
    }

    public function alterar($id) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            
            date_default_timezone_set('America/Sao_Paulo');
            $subatividades = new subatividade();
            $anterior = $subatividades->getUnico($id);
            $novo = nl2br($anterior[0]['observacoes_sub_atividade']) . "\r\n"
                    . $_SESSION['nome_usuario'] . " - "
                    . date('d/m/Y H:i:s', time()) . "\r\n" .
                    nl2br($_POST['obs_incluir']) . "\r\n\r\n";

            if ($_POST['submit'] === 'Recusar') {
                $subatividades->alterar_observacao($id, $novo);
                $subatividades->recusar_execucao($id);
            } elseif ($_POST['submit'] === 'Executar') {
                $subatividades->alterar_observacao($id, $novo);
                $subatividades->executar_subatividades($id);
            }
            elseif ($_POST['submit'] === 'Validar') {
                $subatividades->alterar_observacao($id, $novo);
                $subatividades->validar_execucao($id);
            }




            header('Location: /cronograma/observacao/formAlterar/' . $id);
        }
    }

}
