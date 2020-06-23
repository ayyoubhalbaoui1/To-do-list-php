


<?php
  session_start();

           require_once('./config/dbconfig.php'); 
    $db = new operations();
    $ID= $_SESSION['id'];

      $res =$db->viewTodo($ID);
      $resulat = $db->user($ID);  
     
                         
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    
              $taskid = $_POST['task_id'];
               $taskname = $_POST['task_text'];
               
                
                $db->changeTask($taskname,$taskid);
               
               header('Location: profile.php');
                              
                }










           
              ?>