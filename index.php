<?php include'database.php'; ?>
<?php
/*
 * Ia numarul total de intrebari
 */
$query = "SELECT * FROM `questions`";

//face query
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
//face totalul prin aducerea totalului randurilor
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
                <h2>Test your PHP Knowledge</h2>
                <p>This is a multiple choice quizz to test your knowledge of php</p>
                <ul>
                    <li><strong>Number of questions: </strong><?php echo $total;?> </li>
                    <li><strong>Type: </strong> Multiple Choice</li>
                    <li><strong>Estimated time:</strong><?php echo $total * 0.5;?> min</li>
                </ul>
                <a href="question.php?n=1" class="start">Start Quizz</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2014, PHP Quizzer
            </div>
        </footer>
        
    </body>
</html>
