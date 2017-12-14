<?php include 'database.php'; ?>
<?php session_start();
      session_destroy();?>

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
            <div class="container">
                <h2>You are done!</h2>
                <p>Congrats, you have completed the test!</p>
                <p>Final score: <?php echo $_SESSION['score']; ?></p>
                <a href="question.php?n=1" class="start">Take again!</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2014, PHP Quizzer
            </div>
        </footer>
        
    </body>
</html>
