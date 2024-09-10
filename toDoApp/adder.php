<?php

require("connection.php");
$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="displayFlex flexDirColumn">
    
    <h1>create your project</h1>
    
    <div class="topBar"></div>

    <div class="container displayFlex flexDirColumn" style="justify-content:center;">

    <form class="displayFlex flexDirColumn " action="addToDatabase.php?table=<?php echo $_GET['table'];?>" method="post">

        Project name <input type="text" name="name" required>
        Project description<input type="text" name="description" required>
        Chose date to finish<input type="date" name="date" value="<?php echo $date; ?>">
        <input type="submit" value="send">
        
    </form>

    </div>

</body>
</html>