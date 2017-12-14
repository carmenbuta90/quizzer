<?php include 'database.php';?>
<?php
//verific daca butonul submit a fost apasat
if(isset($_POST['submit'])){
    $number = $_POST['question_number'];
    $text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
 //fac un array de choices  
    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];
    
//query de intrebari
$query = "INSERT INTO `questions`(question_number, text) VALUES ('$number', '$text')";
//ruleaza query-ul
$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

//valideaza query
    if($insert_row){
        foreach($choices as $choice => $value){
            if($value != ''){
              if($correct_choice == $choice){
                  $is_correct = 1;
              }else{
                  $is_correct = 0;
              }
              
              //fac query-ul cu choice-uri
              $query = "INSERT INTO `choices` (question_number, is_correct, text) VALUES ('$number','$is_correct', '$value')";
              //rulez query-ul
              $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
              //validez 
              if($insert_row){
                  continue;
              }else{
                  die('Error: ('.$mysqli->errno.')'. $mysqli->error);
              }
            }
        }
        $msg='Question has been added';
    }
}

$query= "SELECT * FROM `questions`";
$questions =$mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $questions->num_rows;
$next= $total+1;


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
               
                <h2>Add a question:</h2>
                 <?php if(isset($msg)){
                    echo '<p>'. $msg . '</p>';
                } 
                ?>
                <form method="post" action="add.php">
                    <p>
                      <label>Question Number:</label>
                      <input type="number" value="<?php echo $next ;?>" name="question_number">
                    </p>
                    
                     <p>
                      <label>Question Text:</label>
                      <input type="text" name="question_text">
                    </p>
                    
                     <p>
                      <label>Choice #1:</label>
                      <input type="text" name="choice1">
                    </p>
                    
                    <p>
                      <label>Choice #2:</label>
                      <input type="text" name="choice2">
                    </p>
                    
                    <p>
                      <label>Choice #3:</label>
                      <input type="text" name="choice3">
                    </p>
                    
                    <p>
                      <label>Choice #4:</label>
                      <input type="text" name="choice4">
                    </p>
                    
                    <p>
                      <label>Choice #5:</label>
                      <input type="text" name="choice5">
                    </p>
                    
                    <p>
                      <label>Correct choice number:</label>
                      <input type="number" name="correct_choice">
                    </p>
                    
                    <p>
                      <input type="submit" name="submit" value="Submit"/>
                    </p>
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
