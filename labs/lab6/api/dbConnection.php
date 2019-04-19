<?php

function getDatabaseConnection($dbname = 'ottermart'){
//   mysql://ba5d33ca94d16d:90b25549@us-cdbr-iron-east-03.cleardb.net/heroku_100f8b3422c234d?reconnect=true  
 $host = 'localhost';//cloud 9
 $username = 'root';
 $password = '';
 
//  $host = 'us-cdbr-iron-east-03.cleardb.net';//heroku
//  $username = 'ba5d33ca94d16d';
//  $password = '90b25549';
//  $dbname = 'heroku_100f8b3422c234d';
//  //creates data base connection
//  $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
  //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

 
 $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 return $dbConn;
}

?>