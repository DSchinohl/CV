<?php

require("connection.php");
$increment0 = 1;
$increment1 = 1;
$increment2 = 1;
$increment3 = 1;
$increment4 = 1;
$increment5 = 1;
$increment6 = 1;

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
    
    <h1>project manager</h1>
    
    <div class="topBar"></div>
    

    <div class="projectNameLabel displayFlex " style="justify-content: space-around;">
    <?php

    
    for($i = 1; $i < 8; $i++){
        $Query =
        '
        SELECT title FROM titles WHERE locationID = 
        '.$i;
        $result = $connection->query($Query);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
    ?>
    
    <a href="deleteProjectName.php?projectID=1&tableGiven=<?php echo $i; ?>">-
        <span>
            <?php echo $row['title']; ?>
        </span>
    </a>
    
    <?php

        }else{
    ?>
    <a href="addProjectName.php?userID=1&titleName=<?php echo $i; ?>">+

            <span>Add Title</span>
        
        <?php
            }
        }
        ?>

    </a>
    </div>

    <div class="container ">
       
        <div class="topContainerBar displayFlex">

            <a href="adder.php?table=1">+</a>
            <a href="adder.php?table=2">+</a>
            <a href="adder.php?table=3">+</a>
            <a href="adder.php?table=4">+</a>
            <a href="adder.php?table=5">+</a>
            <a href="adder.php?table=6">+</a>
            <a href="adder.php?table=7">+</a>

        </div>
        
        <div class="botContainerBar displayFlex">
            
            <section id="section1">

                <?php
                    
                    $whileIncrement = 1;
                    $Query = 'SELECT * FROM p1 ORDER BY finishDate';
                    $result = $connection->query($Query);
                    
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            if($row['isFinished'] == "" || $row['isFinished'] == "finished"){  
                            echo '<a href="details.php?id='.$row['id'].'&table=1" class="label">'; 
                ?>
                
                    <div>
                        <?php echo $increment0++; ?>
                    </div>
                    
                    <span>

                        <?php if($row['isFinished'] == ""){ 
                            echo $row['finishDate'];
                        } else { 
                            echo "<b style='color: green;'>Finished!</b>";
                        } ?>

                    </span>
                

                <span class="topLabel">
                    
                    <?php
                    echo $row['projectName'];
                    ?>

                </span>

                <?php
                            }
                        }
                    }
                    else{
                        echo 'no project yet!';
                    }
                    echo '</a>';

                ?>

            </section>

            
            <section id="section2">
                    
            <?php

                $Query = 'SELECT * FROM p2 ORDER BY finishDate';
                $result = $connection->query($Query);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($row['isFinished'] == "" || $row['isFinished'] == "finished"){  
                        echo '<a href="details.php?id='.$row['id'].'&table=2" class="label">'; 
                ?>

                <div>
                    
                    <?php echo $increment1++; ?>
                
                </div>
                
                <span>
                    
                    <?php 
                    
                    if($row['isFinished'] == ""){ 
                        echo $row['finishDate'];
                    } else { 
                        echo "Finished!";
                    } 
                    
                    ?>
                
                </span>


                <span class="topLabel">

                    <?php
                         echo $row['projectName'];
                    ?>

                </span>

                <?php
                        }
                    }
                }
                else{
                    echo 'no project yet!';
                }
                echo '</a>';

                ?>

            </section>

            <section id="section3">

            <?php

            $Query = 'SELECT * FROM p3 ORDER BY finishDate';
            $result = $connection->query($Query);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($row['isFinished'] == "" || $row['isFinished'] == "finished"){  
                    echo '<a href="details.php?id='.$row['id'].'&table=3" class="label">'; 
            ?>

            <div><?php echo $increment2++; ?></div>
            <span><?php if($row['isFinished'] == ""){ echo $row['finishDate'];} else { echo "Finished!";} ?></span>
            <span class="topLabel">
                    <?php
                    echo $row['projectName'];
                    ?>
            </span>
            <?php
                    }
                }
            }
            else{
                echo 'no project yet!';
            }
            echo '</a>';

            ?>

            </section>

            <section id="section4">
                <?php

                $Query = 'SELECT * FROM p4 ORDER BY finishDate';
                $result = $connection->query($Query);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($row['isFinished'] == "" || $row['isFinished'] == "finished"){  
                        echo '<a href="details.php?id='.$row['id'].'&table=4" class="label">'; 
                ?>

                <div><?php echo $increment3++; ?></div>
                <span><?php if($row['isFinished'] == ""){ echo $row['finishDate'];} else { echo "Finished!";} ?></span>
                <span class="topLabel">
                    <?php
                    echo $row['projectName'];
                    ?>
            </span>
                <?php
                        }
                    }
                }
                else{
                    echo 'no project yet!';
                }
                echo '</a>';

                ?>
            </section>

            <section id="section5">
            <?php

            $Query = 'SELECT * FROM p5 ORDER BY finishDate';
            $result = $connection->query($Query);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($row['isFinished'] == "" || $row['isFinished'] == "finished"){  
                    echo '<a href="details.php?id='.$row['id'].'&table=5" class="label">'; 
            ?>

            <div><?php echo $increment4++;?></div>
            <span><?php if($row['isFinished'] == ""){
                    echo $row['finishDate'];
                } else { 
                    echo "Finished!";
                }; ?></span>
            <span class="topLabel">
                    <?php
                    echo $row['projectName'];
                    ?>
            </span>
            <?php
                    }
                }
            }
            else{
                echo 'no project yet!';
            }
            echo '</a>';

            ?>
            </section>

            <section id="section6">
<?php

                    $Query = 'SELECT * FROM p6 ORDER BY finishDate';
                    $result = $connection->query($Query);
                    
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            if($row['isFinished'] == "" || $row['isFinished'] == "finished"){  
                            echo '<a href="details.php?id='.$row['id'].'&table=6" class="label">'; 
                ?>
                
                    <div><?php echo $increment5++; ?></div>
                    <span><?php if($row['isFinished'] == ""){ echo $row['finishDate'];} else { echo "Finished!";} ?></span>
                    <span class="topLabel">
                    <?php
                    echo $row['projectName'];
                    ?>
            </span>
                <?php
                            }
                        }
                    }
                    else{
                        echo 'no project yet!';
                    }
                    echo '</a>';

                ?>
            </section>

            <section id="section7">
            <?php

$Query = 'SELECT * FROM p7 ORDER BY finishDate';
$result = $connection->query($Query);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row['isFinished'] == "" || $row['isFinished'] == "finished"){  
        echo '<a href="details.php?id='.$row['id'].'&table=7" class="label">'; 
?>

<div><?php echo $increment6++; ?></div>
<span><?php if($row['isFinished'] == ""){ echo $row['finishDate'];} else { echo "Finished!";} ?></span>
<span class="topLabel">
                    <?php
                    echo $row['projectName'];
                    ?>
            </span>
<?php
        }
    }
}
else{
    echo 'no project yet!';
}
echo '</a>';

?>
            </section>

        <div>

    </div>
    </div>
    <div class="topContainerBar displayFlex"  style="justify-content: space-around;">
        <?php
        for($i=1; $i<8; $i++){
            ?>
            <a href="deleteAll.php?locationID=<?php echo $i; ?>&userID=1">x</a>
            <?php
        }
        ?>
    </div>
</body>
</html>