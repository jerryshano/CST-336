<?php


// {product:"Microfiber Beach Towel", price:40, qty:2}
// {product:"Flip-flop Sandals", price:30, qty:5}
// {product:"Sunscreen 80SPF", price:25, qty:3}
// {product:"Plastic Flying Disc", price:15, qty:4}
// {product:"Beach Umbrella", price:75, qty:1}

$product = array();

$product["product"] = "Microfiber Beach Towel";
$product["price"] = 40;
$product["qty"]= 2;

$productArray = array();
array_push($productArray,$product);

$product["product"] = "Flip-flop Sandals";
$product["price"] = 30;
$product["qty"]= 5;

array_push($productArray,$product);

$product["product"] = "Sunscreen 80SPF";
$product["price"] = 25;
$product["qty"]= 3;

array_push($productArray,$product);

$product["product"] = "Plastic Flying Disc";
$product["price"] = 15;
$product["qty"]= 4;

array_push($productArray,$product);

$product["product"] = "Beach Umbrella";
$product["price"] = 75;
$product["qty"]= 1;

array_push($productArray,$product);

echo json_encode($productArray[rand(0,4)]);








?>