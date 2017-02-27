<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * vanessa marques
 */

require 'environment.php';


define("BASE_URL", "http://localhost/cronograma/");

global $config;
$config = array();


if (ENVIRONMENT == "development"){
    $config['dbname'] = 'cronograma_tfc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    $config['dbname'] = 'cronograma_tfc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}