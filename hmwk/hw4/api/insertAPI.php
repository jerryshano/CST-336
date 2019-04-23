<?php

include 'dbConnection.php';    
$conn = getDatabaseConnection("project");
$arr = array();
//print_r($_POST["list"]);

foreach($_POST["list"] as $movieSearch){

           $arr[":title"] = $movieSearch["title"];
           $arr[":poster"] = $movieSearch["poster_path"];
           $arr[":releaseDate"] = $movieSearch["release_date"];
           $arr[":averageVote"] = $movieSearch["vote_average"];

           // $sql = "INSERT INTO movieSearch ( `title`, `poster`, `releaseDate`, `averageVote`)
           //         VALUES (:title, :poster, :releaseDate, :vote_average)";
                   
           $sql = "INSERT INTO `movieSearch` (`title`, `releaseDate`, `averageVote`, `poster`) VALUES (:title, :releaseDate, :averageVote, :poster)";
                   
           $stmt = $conn->prepare($sql);
           $stmt->execute($arr);
  }
  
?>