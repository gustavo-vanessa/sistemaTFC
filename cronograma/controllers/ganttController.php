<?php

require('libgantt/lib/gantti.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gantt
 *
 * @author Gustavo Martins
 */
class ganttController extends controller {

    public function index() {
//date_default_timezone_set('UTC');
//setlocale(LC_ALL, 'en_US');

        $data = array();



        $data[] = array(
            'label' => 'Project 1',
            'start' => '2012-04-20',
            'end' => '2012-05-12'
        );

        $data[] = array(
            'label' => 'Project 2',
            'start' => '2012-04-22',
            'end' => '2012-05-22',
            'class' => 'important',
        );

        $data[] = array(
            'label' => 'Project 3',
            'start' => '2012-05-25',
            'end' => '2012-06-20',
            'class' => 'urgent',
        );

        print_r($data);
//exit;

        $gantti = new Gantti($data, array(
            'title' => 'Demo',
            'cellwidth' => 25,
            'cellheight' => 35
        ));

        $array['gantt'] = $gantti;

        $this->loadTemplate('gantt/gantt', $array);
    }

    public function ganttProjeto($id) {
        session_start();
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $_SESSION['id_projeto'] = $id;
            $atividades = new atividade();
            $subAtividade = new subatividade();
            $dados['atividades'] = $atividades->listaAtividadesProjetoGantt($id);
            $dados['subatividades'] = $subAtividade->getProjetoSubatividadeGantt();
            $titulo = ($dados['atividades'][0]['nome_projeto']);


            foreach ($dados['atividades'] as $atividade) {
                $data[] = array(
                    'label' => $atividade['nome_atividade'],
                    'start' => $atividade['data_inicio_atividade'],
                    'end' => $atividade['data_fim_atividade'],
                );

                foreach ($dados['subatividades'] as $subatividade) {
                    if ($atividade['id_atividade'] === $subatividade['id_atividade']) {
                        $data[] = array(
                            'label' => $subatividade['nome_sub_atividade'],
                            'start' => $subatividade['data_inicio_sub_atividade'],
                            'end' => $subatividade['data_fim_sub_atividade'],
                        );
                    }
                }
            }


            // print_r($data);
            //  exit;

            $gantti = new Gantti($data, array(
                'title' => $titulo,
                'cellwidth' => 25,
                'cellheight' => 35
            ));

            $array['gantt'] = $gantti;

            $this->loadTemplate('gantt/gantt', $array);
        }
    }

}
