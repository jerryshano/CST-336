<?php

//receives these parameters: action, url, keyword
 include 'dbConnection.php';
 $conn = getDatabaseConnection("c9");

 $action = $_GET['action'];

 $np = array();
 
  switch ($action) {
        
        case "add":    $sql = "INSERT INTO lab8_pixabay (imageURL, keyword) VALUES (:favorite, :keyword)";
                       $np[':keyword'] = $_GET['keyword'];
                       $np[':favorite'] = $_GET['favorite'];
                       break;
        case "delete":  $sql = "DELETE FROM lab8_pixabay WHERE imageURL = :favorite";
                        $np[':favorite'] = $_GET['favorite'];
                        break;
        case "keyword": //displays list of unique keywords (hint: use DISTINCT)
                        $sql = "SELECT DISTINCT (keyword) FROM lab8_pixabay";
                        break;
        case "favorites": //display favorite images based on the keyword 
                        $sql = "SELECT imageURL FROM lab8_pixabay WHERE keyword = :keyword";
                        $np[':keyword'] = $_GET['keyword'];
                        break;
                        
                             // SELECT imageURL FROM `lab8_pixabay` WHERE keyword = 'shark'
    }//switch

    
    $stmt = $conn->prepare($sql);
    if (!empty($np))
     $stmt->execute($np);
    else
     $stmt->execute();
    
    //fetch when using SELECT
    if ($action == "favorites" || $action == "keyword"){
        $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
       echo json_encode($record); 
    
    

?>