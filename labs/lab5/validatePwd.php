<?php
    
$run = $_GET["username"];
$stam = $_GET["pass"];
    
$pants = array();
$cat = stripos($stam, $run);

if ($cat === true){
    $pants["valid"] = false;
}else{
    $pants["valid"] = true;
}

echo json_encode($pants);
    
?>