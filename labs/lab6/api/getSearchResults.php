<?php

    include 'dbConnection.php';    
    $conn = getDatabaseConnection("ottermart");   
    $namedParameters = array();
    $sql = "SELECT * FROM om_product WHERE 1";
    
    //checks whether the user has typed something in the "Product" texxt box
    if (!empty($_GET['product'])){
        $sql .= " AND productName LIKE :productName";   
        $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
    }//if  
    //checks whetrher the user has selected a category of product
    if (!empty($_GET['category'])){
        $sql .= " AND catId LIKE :categoryId";   
        $namedParameters[":categoryId"] = "%" . $_GET['category'];
    }//if
    //checks whether user has typed something in the price text boxes
    if (!empty($_GET['priceFrom'])){
        $sql .= " AND price >= :priceFrom";
        $namedParameters[":priceFrom"] = $_GET['priceFrom'];
    }//if
    //checks whether the user has typed somthing into the prioce text boxes
    if (!empty($_GET['priceTo'])){
        $sql .= "AND price <= :priceTo";
        $namedParameters[":priceTo"] = $_GET['priceTo'];
    }//if
    if (isset($_GET['orderBy'])){
        if($_GET['orderBy'] == "price"){
            $sql .= " ORDER BY price";
        }  
    }
    else if ($_GET['orderBy'] == "name"){
        $sql .= " ORDER BY productName";
    }
   
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    echo json_encode($records);
?>