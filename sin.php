<?php
$x = -pi();
$arr = array();
while ($x <= pi()) {
    $arr[count($arr)] = sin(deg2rad($x));
    $x += 0.1;
    }
    foreach($arr as $value) {
      echo $value;
      echo "\n";
    };

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

