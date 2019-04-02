<?php

$first = array();

$first[0] = array();
$first[0]['answer']= "sacramento";
$first[0]['question']= "What's the capitol of California?";


$first[1] = array();
$first[1]['answer']= "new york";
$first[1]['question']= "What's the capitol of new york?";

$randomNum = rand(0,1);

echo json_encode($first[$randomNum]);

?>