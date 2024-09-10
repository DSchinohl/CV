<?php

require("connection.php");
$tableGiven = $_GET['table'];
require("switch.php");

$name = $_POST["name"];
$description = $_POST["description"];
$date = $_POST['date'];

$Query = 'INSERT INTO '.$tableGiven.' (id, projectName, finishDate, isFinished, descripion, userID, projectID, mainProjectName) 
VALUES (NULL, "'.$name.'", "'.$date.'","" , "'.$description.'", 1, 1, "'.$name.'");';

echo $Query;

$tempQuery = 'SELECT COUNT(id) FROM '.$tableGiven;
$tempResult = $connection->query($tempQuery);

if($tempResult->num_rows > 0){
    $row = $tempResult->fetch_assoc();
    if($row['COUNT(id)'] < 8){
        $result = $connection->query($Query);
    }
}

header("location: index.php");

?>