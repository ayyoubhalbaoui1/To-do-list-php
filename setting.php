<!doctype html>


  <?php
  session_start();

           require_once('./config/dbconfig.php'); 
    $db = new operations();
    $ID= $_SESSION['id'];
    $res= $db->info($ID);
     $resulat = $db->user($ID);
     
  
                                    
             


                                
    
    
   
          
            if (isset($_SESSION['user'])) {
             
           
              ?>
<html lang="en">



<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v3.8.6">
  <title>Myprofile</title>
   <script src="https://kit.fontawesome.com/f87defdbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/todos.css">
</head>

   

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
      <a class="navbar-brand" href="index.php">MyList</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle" src='imgs/<?php echo $resulat[0][0];?>'  style=" width: 50px; height: 50px">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="profile.php">profile</a>
          <a class="dropdown-item" href="#">Setting</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
        </ul>
        


        </div>

      </div>
      </div>
    </nav>
  </header>




     <div class="container mt-5">

     	
     	<div class="row">
   <div class="d-block mx-auto mt-5">
      <img src='imgs/<?php echo $resulat[0][0];?>' alt class="rounded-circle  " style="height: 300px;width: 300px;">
          </div>

   

     		<div class="col-lg-12 mb-5">
   
      <?php foreach ($res as $row) { ?>
    
    
<form action="settingup.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">image:</label><h6 style="display:inline;color: white">you can change your image </h6>

    <input type="file" class="form-control file"  name="photo"><button type="submit" class="btn btn-primary btt " name="btt">SEND</button>
</div>
   </form>
   <div class="form-group">
    <label for="exampleInputEmail1">fisrtName</label>
    <input type="text" class="form-control"  value="<?php echo $row['first_name'] ?>">
    
  </div>  			
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $row['last_name'] ?>" >
   
  </div>
  <div class="form-group">
    <label >Email address</label>
    <input type="email" class="form-control" value="<?php echo $row['email'] ?>">
    
  </div>
  <form action="settingup.php" method="POST">
  <div class="form-group">
    <label>Username:</label><h6 style="display:inline;color: white">you can change your uername </h6>
    <input type="text" class="form-control" value="<?php echo $row['user_name'] ?>" name="user_name"  >
  </div>
  <div class="form-group">
    <label >Password:</label><h6 style="display:inline;color: white">you can change your password </h6>
    <input type="password" class="form-control" value="<?php echo $row['password'] ?>" name="password" id="pass"  >
  </div>

  
  
  <button type="submit" class="btn btn-primary btn-lg d-block mx-auto " name="bt">Submit</button>
</form>
  <?php  }    ?>
  





 </div>

     	</div>
     	
     </div>
























    
  

        <?php
          }else{

            header('Location:login.php');
            exit();
          }


        ?>


    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

   <script>
    let pa= document.getElementById('pass');


   pa.onfocus= function () {
     	
     	pa.type="text";
     }
   pa.onblur= function () {
     	
     	pa.type="password";
     }

   

   

</script>


</body>

</html>
