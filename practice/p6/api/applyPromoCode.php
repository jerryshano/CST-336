<?php

// "getFifty", "halfPrice”  get 50% off         
// "sand30", "spring30”  get 30% off
// "beach", "sunny”         get 20% off

$codes = array();

$codes["getFifty"] = 50;
$codes["halfPrice"] = 50;
$codes["sand30"] = 30;
$codes["spring30"] = 30;
$codes["beach"] = 20;
$codes["sunny"] = 20;

$input = $_GET["code"];


$ret = array();

$ret["discount"] = isset($input) && array_key_exists($input, $codes) ? $codes[$input] : 0;

echo json_encode($ret);



?>