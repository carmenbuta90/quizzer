<?php include'database.php'; ?>
<?php
//stabileste nr intrebarii
$number = (int)$_GET['n'];

/*
*ia intrebarile
*/

//face un query care iti aduce doar prima intrebare
$query= "SELECT * FROM `questions` WHERE question_number = $number";

//stocheaza rezultatele query-ului intr-o variabila
$result = $mysqli->query($query)or die ($mysqli->error.__LINE__);

//asigneaza rezultatele unei variabile care poate fi folosita ca un array asociativ
$questions = $result->fetch_assoc() ;


/*
* ia raspunsurile la intrebari
*/

$query = "SELECT * FROM `choices` WHERE question_number = $number";
$choices = $mysqli->query($query)or die ($mysqli->error.__LINE__);

//ia nr total de intrebari
$query= "SELECT * FROM `questions`";
$results =$mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Quizzer</title>
        <link rel="stylesheet" href="css/style.css"/>
    <body>
        <header>
            <div class="container">
                <h1>PHP Quizzer</h1> 
            </div>
        </header>
        <main>
            <div class="container">
                <div class="current">Question <?php echo $number; ?> of <?php echo $total;?></div>
                <p class="question"><?php echo $questions['text'] ;?></p>
                <form method="post" action="process.php">
                    <ul class="choices">
                        <?php while($row = $choices->fetch_assoc()) :?>
                         <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"/><?php echo $row['text'] ;?></li>
                         
                        <?php endwhile ;?>
               
                    </ul>
                    <input type="submit"name="submit" value="Submit"/>
                    <input type="hidden" name="number" value="<?php echo $number ;?>">
                </form>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2014, PHP Quizzer
            </div>
        </footer>
        
    </body>
</html>
