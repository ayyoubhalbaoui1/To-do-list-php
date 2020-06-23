<?php


require_once('./config/dbconfig.php');
 
     // $usErr =$passErr=$msg="" ;
     //  $username= $password="";
      

     if (isset($_POST['register'])) {
       $firstname = test_inpu(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
      $lastname =test_inpu(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
      $username = test_inpu(filter_var($_POST['user_name'], FILTER_SANITIZE_STRING));
      $email =test_inpu(filter_var($_POST['email'], FILTER_SANITIZE_STRING));
      $password =test_inpu(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
       $photo=$_POST["photo"];
      // $photo = $_FILES['photo']['name'];

      

      if (empty($username) OR empty($password)) {
          
          echo "please fill input";   

      }else{

     
 $stmt = $db->connection->prepare('SELECT * FROM user WHERE user_name = ? ');
    $stmt->execute(array($username));
     $rows = $stmt->rowCount();


    if($rows > 0)
    {
        echo $msg= "is already exist enter another username";
        
    }else{

        
  $stmt = $db->connection->prepare('INSERT INTO user (user_name,password,email,first_name,last_name,photo) VALUES (?,?,?,?,?,?)');
   $ro = $stmt->execute(array($username,$password,$email,$firstname,$lastname,$photo));

   // move_uploaded_file($_FILES['photo']['tmp_name'],"imgs/".$_FILES['photo']['name']);

    
 if($ro){
   
      echo $msg= "sigup is success";
          }

}

    }

}


   








function test_inpu($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}






?>