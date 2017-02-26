<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of homeController
 *
 * @author Gustavo Martins
 */
class homeController extends controller{
    public function index(){
      $dados =array();        
        $this->loadTemplate('login',$dados);
    }
}
