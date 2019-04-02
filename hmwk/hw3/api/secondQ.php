<?php

$second = array();

$second[0] = array();
$second[0]['answer']= "ford";
$second[0]['question']= "who makes the mustang gt?";


$second[1] = array();
$second[1]['answer']= "chevy";
$second[1]['question']= "who makes the silverado?";

$randomNum = rand(0,1);

echo json_encode($second[$randomNum]);

?>