<?php


session_start();

    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $ID= $_SESSION['id'];



 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["done"])) {
 	
     
    $name= $_POST["name"]; 
    $done = false;
     $id= $_POST["id"];
     $done= $_POST["done"];
    
    $db->insertTask($name,$done,$id);
    $task_list_id=$db->lastInsertId();



 
    echo '<li data-id="'.$task_list_id.'">'.$name.'</li>';
   
     
     }




    








 	 

















?>