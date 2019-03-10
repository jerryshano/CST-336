<?php

$val1 = array("eeny","meeny","miny","maria","john");

$val2 = array();

if(in_array(strtolower($_GET["username"]),$val1)){
    $val2["available"] = false;
    }else{
    $val2["available"] = true;
}
echo json_encode($val2);


?>