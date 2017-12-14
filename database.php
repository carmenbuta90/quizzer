<?php
//creez variabile cu credentialele
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'quizzer';


//creez obiectul de msqli
$mysqli= new mysqli($db_host, $db_user, $db_password, $db_name);

//in caz de erroare afiseaza numele erorii

if($mysqli->connect_error){
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}
    