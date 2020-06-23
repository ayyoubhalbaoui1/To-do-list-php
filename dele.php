<?php


session_start();

    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $ID= $_SESSION['id'];



 if ($_SERVER["REQUEST_METHOD"] == "GET") {
 	
     
     $id= $_GET["id"];
     
    
    $db->deleteTodo($id);
 
    header('Location:profile.php');
     
     }




    








 	 

















?>