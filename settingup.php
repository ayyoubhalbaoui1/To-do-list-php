<!doctype html>


  <?php
  session_start();

           require_once('./config/dbconfig.php'); 
    $db = new operations();
    $ID= $_SESSION['id'];
   
     
     
  if(isset($_POST["bt"])){
    
               echo $us = $_POST['user_name'];
             
                echo $pa = $_POST['password'];
                echo $d= $_SESSION['id'];
                  
        
                  
                $db->updateInfo($us,$pa,$d);
               
                  header("Location:setting.php"); 
                  exit();            
                } 
                                    
             
             if(isset($_POST["btt"])){
    
                $ph = $_POST['photo'];
                 $id= $_SESSION['id'];
                  
        
                  
                $db->updateInfoim($ph,$id);
               
                  header("Location:setting.php"); 
                  exit();            
                } 
                           

                                
    
    
   ?>