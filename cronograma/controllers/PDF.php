    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF
 *
 * @author Gustavo Martins
 */
require('relatorio/tfpdf.php');

class PDF extends tFPDF {
    
        function tabelaProjeto($header, $data) {
       //print_r($data);
           
        $w = array(40, 45, 110,75);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[1], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        
        foreach ($data as $inf) {
            $this->Cell($w[1], 6, $inf['id_projeto'], 'LR');
            $this->Cell($w[1], 6, $inf['nome_projeto'], 'LR');
            If ($inf['status_projeto']==='AP'){
             $inf['status_projeto'] = 'Aprovado TFC I';
            }
            else If ($inf['status_projeto']==='A'){
             $inf['status_projeto'] = 'Ativo';
            }
            else If ($inf['status_projeto']==='I'){
             $inf['status_projeto'] = 'Inativo';
            }
            $this->Cell($w[1], 6, $inf['status_projeto'], 'LR');
            $this->Cell($w[1], 6, $inf['data_validacao'], 'LR');
            $this->Cell($w[1], 6, $inf['nome_orientador'], 'LR');
            $this->Cell($w[1], 6, $inf['nome_orientando'], 'LR');
            $this->Ln();
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    
    function tabelaAtividadePadrao($header, $data) {
      //print_r($data);
           
        $w = array(20, 90, 90, 40, 30);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        
        foreach ($data as $inf) {
            $this->Cell(20, 6, $inf['id_atividades_padroes'], 'LR');
            $this->Cell(90, 6, substr($inf['nome_atividades_padroes'],0,35), 'LR');
            $this->Cell(90, 6, substr($inf['descricao_atividades_padroes'],0,35), 'LR');
            $this->Cell(40, 6, $inf['desc_pmbok'], 'LR');
            If ($inf['ie_obrigatorio_atividades_padroes']==='S'){
             $inf['ie_obrigatorio_atividades_padroes'] = 'Sim';
            }
            else If ($inf['ie_obrigatorio_atividades_padroes']==='N'){
             $inf['ie_obrigatorio_atividades_padroes'] = 'Não';
            }
            $this->Cell(30, 6, $inf['ie_obrigatorio_atividades_padroes'], 'LR');
            $this->Ln();
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    
    function tabelaSubatividadePadrao($header, $data) {
        
    }
    
        
    
    function tabelaPerfil($header, $data) {
        $w = array(40, 45, 110);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        foreach ($data as $inf) {
            //$this->maiorTamanho($inf);
            for ($i = 0; $i < (count($inf) / 2); $i++) {
                $this->Cell($w[$i], 6, $inf[$i], 'LR');
            }
            $this->Ln();
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    
    function tabelaUsuario($header, $data) {
        $w = array(40, 45, 110);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        foreach ($data as $inf) {
            //$this->maiorTamanho($inf);
            for ($i = 0; $i < (count($inf) / 2); $i++) {
                $this->Cell($w[$i], 6, $inf[$i], 'LR');
            }
            $this->Ln();
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    
    function tabelaPmbok($header, $data) {
        $w = array(40, 45, 110);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        foreach ($data as $inf) {
            for ($i = 0; $i < (count($inf) / 2); $i++) {
                $this->Cell($w[$i], 6, $inf[$i], 'LR');
            }
            $this->Ln();
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}
