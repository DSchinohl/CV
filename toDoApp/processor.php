<?php

require("connection.php");

$tableGiven = $_GET['tableGiven'];
$userID = $_GET['userID'];
$title = $_POST['title'];

$Query = 
'
INSERT INTO titles(id, title, userID, locationID)
VALUES(0,"'.$title.'",'.$userID.','.$tableGiven.');

';
echo $Query;
$result = $connection->query($Query);

header("location: index.php");

?>