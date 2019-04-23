<?php
include 'dbConnection.php';
$conn = getDatabaseConnection("project");

$text = $_GET['text'];
//print_r($text);
$namedParameters=array();

$sql = "SELECT * FROM movieSearch WHERE title LIKE '%$text%'";

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($records);

?>