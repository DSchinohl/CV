<?php
require("connection.php");


$tableGiven = $_GET['table'];
$id = $_GET['id'];

require("switch.php");

$Query = 'SELECT * FROM '.$tableGiven.' WHERE id= '.$id;
$result = $connection->query($Query);

if($result->num_rows == 1){
    $row = $result->fetch_assoc();
}else if($result->num_rows == 0){
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body class="displayFlex flexDirColumn">
    
    <h1>project details</h1>
    
    <div class="topBar"></div>

    <div class="container displayFlex" style="justify-content: center;">
       
        <div class="details">

            <div class="detailsInfo displayFlex flexDirColumn">

                <b><?php  echo $row['projectName']  ?></b>
                <br> <br>
                <?php echo $row['descripion'];?>
            
            </div>
            
            <div class="detailsSettings displayFlex">

                <a href="finisher.php?id=<?php echo $_GET['id'];?>&table=<?php echo $_GET['table'];?>" class="finished">V</a> 
                <a href="deleter.php?id=<?php echo $_GET['id'];?>&table=<?php echo $_GET['table'];?>" class="unfinished">X</a>
                
                <form action="dateChange.php?id=<?php echo $_GET['id'];?>&table=<?php echo $_GET['table'];?>" method="post" class="displayFlex flexDirColumn">

                    <input type="date" name="date" value="<?php echo $row['finishDate'];?>">
                    <input type="submit" value="send">

                </form>

            </div>
        
        </div>

    </div>
</body>
</html>