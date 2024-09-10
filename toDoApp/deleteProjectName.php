<?php

require("connection.php");

$id = $_GET['projectID'];
$tableGiven = $_GET['tableGiven'];

$Query = "DELETE FROM titles 
        WHERE locationID = "
        .$tableGiven;
echo $Query;

$result = $connection->query($Query);

header("location: index.php");
?>