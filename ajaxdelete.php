<?php


session_start();

    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $ID= $_SESSION['id'];



 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	
     
     $id= $_POST["id"];
    
    $db->deleteTask($id);
 
    
     
     }




    








 	 

















?>