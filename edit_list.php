


<?php
  session_start();

           require_once('./config/dbconfig.php'); 
    $db = new operations();
    $ID= $_SESSION['id'];

      $res =$db->viewTodo($ID);
      $resulat = $db->user($ID);  
     
                         
  if(isset($_POST["up"])){
    
             echo  $n = $_POST['name'];
              echo  $c = $_POST['color'];
               echo  $d= $_POST['todolist_id'];
                  
        
                  
                $db->updateList($n,$c,$d);
                header('Location: profile.php');
                exit();
               
                              
                }





    if(isset($_POST['list']))
            {
                $nm = $_POST['name'];
                $col = $_POST['color'];
                 $us= $_SESSION['id'];

                $db->insertTodo($nm,$col,$us);
                
                
                 header('Location: profile.php');
            exit();
             

                     }


   
         ?>









           
              ?>