<?php
    header('Access-Control-Allow-Origin: *');
    include 'dbConnection.php';    
    $conn = getDatabaseConnection("ottermart");
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql); // This will send the sql you provided
    $stmt->execute();// This will execute the sql
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //To save and use the results from the SQL, we save it to variable $records
    echo json_encode($records);
    //To return the results when the API is called, we echo in json format $records
?>