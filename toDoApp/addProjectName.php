<?php

$tableGiven = $_GET['titleName'];
$userID = $_GET['userID'];

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
    
    <h1>project manager</h1>
    
    <div class="topBar"></div>

    <div class="container displayFlex flexDirColumn" style="justify-content: center;">
        
        <h1>Enter title to your project! </h1><br><br>
        <form action="processor.php?userID=1&tableGiven=<?php echo $tableGiven; ?>" method="post" class="displayFlex flexDirColumn">
            <input type="text" name="title" required><br>
            <input type="submit">
        </form>
    
    </div>

</body>
</html>