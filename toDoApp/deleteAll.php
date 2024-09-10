<?php

require("connection.php");

$id = $_GET['userID'];
$locationID = $_GET['locationID'];
$tableGiven = $_GET['locationID'];

require("switch.php");

$locationDeleteQuery = "DELETE FROM titles WHERE userID = "
            .$id.
            " AND locationID = "
            .$locationID;

$rowsDeleteQuery = "DELETE FROM "
            .$tableGiven.
            " WHERE userID = "
            .$id;

echo $locationDeleteQuery.'<br>'.$rowsDeleteQuery;

$deleteRows = $connection->query($rowsDeleteQuery);
$deleteLocation = $connection->query($locationDeleteQuery);

header("location: index.php");
?>