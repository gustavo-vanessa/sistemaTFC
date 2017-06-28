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


        $gantti = new Gantti($data, array(
            'title' => 'Demo',
            'cellwidth' => 25,
            'cellheight' => 35
        ));

        $array['gantt'] = $gantti;

        $this->loadTemplate('gantt/gantt', $array);
    }

    public function ganttProjeto($id) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['nome_usuario'])) {
            header('Location: /cronograma');
        } else {
            $_SESSION['id_projeto'] = $id;
            $atividades = new atividade();
            $subAtividade = new subatividade();
            $dados['atividades'] = $atividades->listaAtividadesProjetoGantt($id);
            $dados['subatividades'] = $subAtividade->getProjetoSubatividadeGantt();
            /**
             * atrasada -> A
             * validada -> F - F
             * executada -> P
             * 
             * 
             * 
             * when sa.status_sub_atividade = 'NE' then 'Não Executada'
              when sa.status_sub_atividade = 'E' then 'Executada'
              when sa.status_sub_atividade = 'EA' then 'Executada em Atraso'
              when sa.status_sub_atividade = 'A' then 'Atraso'
             * 
             * 
             * 
             * case 
              when a.status_atividade = 'A' then 'Atrasada'
              when a.status_atividade = 'P' then 'Processando'
              when a.status_atividade = 'F' then 'Finalizada'
              else ''
              end as
             * 
             * 
             * 
             * 
             * print_r($dados['atividades']);
            
             print_r($dados['subatividades']);
            
            exit;
             * */
            
            if (isset($dados['atividades']) == 1) {
                $titulo = ($dados['atividades'][0]['nome_projeto']);
                foreach ($dados['atividades'] as $atividade) {
                    switch ($atividade['status_atividade']) {
                        case 'A':
                            $data[] = array(
                                'label' => $atividade['nome_atividade'],
                                'start' => $atividade['data_inicio_atividade'],
                                'end' => $atividade['data_fim_atividade'],
                                'class' => 'atrasada',
                            );
                            break;
                        case 'P':
                            $data[] = array(
                                'label' => $atividade['nome_atividade'],
                                'start' => $atividade['data_inicio_atividade'],
                                'end' => $atividade['data_fim_atividade'],
                                'class' => 'executada',
                            );
                            break;
                        case 'F':
                            $data[] = array(
                                'label' => $atividade['nome_atividade'],
                                'start' => $atividade['data_inicio_atividade'],
                                'end' => $atividade['data_fim_atividade'],
                                'class' => 'validada',
                            );
                            break;
                        default:
                            $data[] = array(
                                'label' => $atividade['nome_atividade'],
                                'start' => $atividade['data_inicio_atividade'],
                                'end' => $atividade['data_fim_atividade'],
                            );
                            break;
                    }


                    foreach ($dados['subatividades'] as $subatividade) {
                        if ($atividade['id_atividade'] === $subatividade['id_atividade']) {


                            switch ($subatividade['status_sub_atividade']) {
                                case 'A':
                                    $data[] = array(
                                        'label' => $subatividade['nome_sub_atividade'],
                                        'start' => $subatividade['data_inicio_sub_atividade'],
                                        'end' => $subatividade['data_fim_sub_atividade'],
                                        'class' => 'atrasada',
                                    );
                                case 'EA':
                                    $data[] = array(
                                        'label' => $subatividade['nome_sub_atividade'],
                                        'start' => $subatividade['data_inicio_sub_atividade'],
                                        'end' => $subatividade['data_fim_sub_atividade'],
                                        'class' => 'atrasada',
                                    );
                                    break;
                                case 'FA':
                                    $data[] = array(
                                        'label' => $subatividade['nome_sub_atividade'],
                                        'start' => $subatividade['data_inicio_sub_atividade'],
                                        'end' => $subatividade['data_fim_sub_atividade'],
                                        'class' => 'atrasada',
                                    );
                                    break;
                                case 'E':

                                    $data[] = array(
                                        'label' => $subatividade['nome_sub_atividade'],
                                        'start' => $subatividade['data_inicio_sub_atividade'],
                                        'end' => $subatividade['data_fim_sub_atividade'],
                                        'class' => 'executada',
                                    );
                                    break;
                                case 'F':

                                    $data[] = array(
                                        'label' => $subatividade['nome_sub_atividade'],
                                        'start' => $subatividade['data_inicio_sub_atividade'],
                                        'end' => $subatividade['data_fim_sub_atividade'],
                                        'class' => 'validada',
                                    );
                                    break;

                                default:

                                    $data[] = array(
                                        'label' => $subatividade['nome_sub_atividade'],
                                        'start' => $subatividade['data_inicio_sub_atividade'],
                                        'end' => $subatividade['data_fim_sub_atividade'],
                                    );
                                    break;
                            }
                        }
                    }
                }


                $gantti = new Gantti($data, array(
                    'title' => '',//$titulo,
                    'cellwidth' => 30,
                    'cellheight' => 35
                ));

                $array['gantt'] = $gantti;
                $array['projeto']=$titulo;
            } else {
                $array['gantt'] = null;
            }
            $this->loadTemplate('gantt/gantt', $array);
        }
    }

}
