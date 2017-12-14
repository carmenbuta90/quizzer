<?php include "database.php" ;?>
<?php session_start(); ?>
<?php
//verific daca scorul nu e setat si daca nu il setez la valoarea 0
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

// se iau nr intrebarii si raspunsul selectat
//pas 1.se verifica daca butonul submit a fost apasat

if($_POST['submit']){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number + 1;
    
    //get total number of questions
    $query= "SELECT * FROM `questions`";
    $results =$mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
 
    //get correct choice
    $query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $row = $result->fetch_assoc();
    $correct_choice = $row['id'];
    
    
    if($selected_choice == $correct_choice){
        $_SESSION['score'] ++;
    }
    
    if($number == $total){
        header ('Location: final.php');
        exit();
    }else{
        header('Location: question.php?n='.$next);
        exit();
    }
}
