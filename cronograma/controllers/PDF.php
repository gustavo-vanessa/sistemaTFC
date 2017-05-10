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
    
    function tabelaProjeto($header, $data) {
       //print_r($data);
           
        $w = array(40, 45, 110);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[1], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        
        foreach ($data as $inf) {
            print_r($inf);
            echo '<br>';
            echo '<br>';
            echo '<br>';
            
            for ($i = 0; $i < (count($inf) / 2); $i++) {
                echo 'inf na posicao: '.$i. ' ------------------> ';
                echo $inf[$i];
                echo '<br>';
                //$this->Cell($w[1], 6, $inf[$i], 'LR');
            }
            echo '<br>';
            echo '<br>';
            echo '<br>';
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
