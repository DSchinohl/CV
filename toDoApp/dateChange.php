<?php
require("connection.php");

$dateGiven = $_POST['date'];
$tableGiven = $_GET['table'];
$id = $_GET['id'];

require("switch.php");

$Query = 'UPDATE '.$tableGiven.' SET finishDate = "'.$dateGiven.'" WHERE id = '.$id.';';
$result = $connection->query($Query);

if($result->num_rows){
    $row = mysqli_fetch_array($result);
}
header("location: index.php");
?>