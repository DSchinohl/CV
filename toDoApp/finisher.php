<?php

require("connection.php");

$tableGiven = $_GET['table'];
$id = $_GET['id'];

require("switch.php");

$Query = 'UPDATE '.$tableGiven.' SET isFinished = "finished" WHERE id = '.$id.';';
$result = $connection->query($Query);

if($result->num_rows == 1){
    $row = mysqli_fetch_array($result);
}
header("location: index.php")
?>