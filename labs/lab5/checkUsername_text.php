<?php

$val1 = array("eeny","meeny","miny","maria","john");

if(in_array(strtolower($_GET["username"]),$val1)){
    echo "not good to go";
}else{
    echo"good to go";
}


?>