<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validaLogin
 *
 * @author Vanessa Marques
 */
class validaLoginController extends controller {
    public function index() {
     $dados = array();
     $this->loadTemplate('home/home', $dados);   
    }
}
