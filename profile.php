<!doctype html>


  <?php
  session_start();

           require_once('./config/dbconfig.php'); 
    $db = new operations();

    $ID= $_SESSION['id'];

      $res =$db->viewTodo($ID);
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
      <a class="navbar-brand" href="index.php">Tasks</a>
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
          <a class="dropdown-item" href="setting.php">Setting</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
        </ul>
        


        </div>

      </div>
      </div>
    </nav>
  </header>




    

  <div class="container">
  	
  	<div class="row">
           
       
<div class="btn btn-primary pd-5 rounded-pill btn-lg active bns"   data-toggle="modal" data-target="#list"   >New Task <i class="fa fa-plus float-right mt-1 ml-1"></i>
  	</div>
                <?php foreach ($res as $row) { ?>
  		<div class="col-lg-12 mb-5">

  	
     <h2 style="background-color:<?php echo $row['color'] ?> "><?php echo $row['name'] ?><a href="dele.php?id=<?php echo $row['todolist_id']?>"><i class="fa fa-trash float-left" style="cursor: pointer;color: white "></i></a>
     <i class="fa fa-plus" data-toggle="modal" data-target="#add" style="cursor: pointer;"  lang="<?php echo $row['color'] ?>" title="<?php echo $row['name'] ?>"    id="<?php echo $row['todolist_id']?>" onclick="change(this);"></i></h2>

	<input type="text" onkeyup="jax(this)" id="<?php echo $row['todolist_id']?>" placeholder="Add A Task">
           <?php
           $to=$row['todolist_id'];
           $taks = $db->ajax($to);
           foreach($taks as $task){
           $style = '';
        if($task["done"] == true){
                       $style = 'text-decoration: line-through';
                }
	echo '<ul class="ul" id="ul" >';
            
		echo '
		<li onclick="update(this);" style="'.$style.';cursor:pointer; padding-left:9px;
" id="'.$task["task_id"].'">'.$task['task_text'].'</li><div class="vv"><i onclick="delet(this);" id="'.$task['task_id'].'" class="fa fa-trash  mr-1" ></i><i onclick="cha(this);" id="'.$task['task_id'].'" title="'.$task['task_text'].'"   class="fa fa-edit" data-toggle="modal" data-target="#chan"></i></div>';
       
	
	
	echo '</ul>';
	} ?>
	</div>

		
	<?php } ?>

 



	</div>
</div>



       


<div id="list" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Creat Task</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  action="edit_list.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Task Name">
                </div>
                <div class="form-group">
                  <input type="color" class="form-control" name="color" placeholder="CHOOSE A COLOR">
                </div>
                
               
                <div class="text-center">
                  <button type="submit" name="list" class="btn">Add</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->

    </div>
    </div>
              


        
     
<div id="add" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">CHANGE YOUR LIST</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  action="edit_list.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" id="nm" name="name"  placeholder="TO DO LIST NAME">
                </div>
                <div class="form-group">
                  <input type="color" class="form-control" id="cl" name="color" placeholder="CHOOSE A COLOR" >
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="dl" name="todolist_id">
                </div>
               
                <div class="text-center">
                  <button type="submit" name="up" class="btn">Update</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->

  </div>
  </div>
  


      
     
<div id="chan" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">CHANGE YOUR TASK NAME</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  action="changedo.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" id="chanm" name="task_text"  placeholder="TO DO LIST NAME">
                </div>
                
                <div class="form-group">
                  <input type="hidden" class="form-control" id="taskid" name="task_id">
                </div>
               
                <div class="text-center">
                  <button type="submit" name="chan" class="btn">CHNAGE</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->

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
  
  


















   function change(elem) {
   	let gg =document.getElementById('dl');
    let nm= document.getElementById('nm');
    let cl= document.getElementById('cl');

   	 let name =elem.title;
   	 let color =elem.lang;
    let vl= elem.id;
     
     nm.value=name;
     cl.value=color;
     gg.value=vl;
   }


 
   function jax(even){
    if(event.keyCode == 13){

     
        const ip = even.value; 
        const todoID= even.id; 
        console.log(todoID,ip);
       
          
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	
   // var gg =document.getElementById('ul');
   //   $b=this.responseText;
    
   //  gg.insertAdjacentHTML('beforeend',this.responseText);
    console.log(this.responseText);


    }
  };
  
  xhttp.open("POST", "ajax.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("name="+ip+"&done=false&id="+todoID);
  even.value ="";
  
    var myVar = setInterval(load, 500);

function load() {


 location.reload();
}

function myStopFunction() {
  clearInterval(myVar);
}



}
     
     

};

 
  


   function update(eve){
    
        
        const ID= eve.id;
        console.log(ID);
       
          
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "ajaxupdate.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+ID);

      var myVar = setInterval(load, 500);

function load() {

 location.reload();
}

function myStopFunction() {
  clearInterval(myVar);
}

  
    
};






  function cha(eve){
    
   let task =document.getElementById('taskid');
    let chan= document.getElementById('chanm');     
        const id= eve.id;
        const nm= eve.title;
        
        task.value=id;
        chan.value=nm;
       console.log( task.value=id,chan.value=nm);
          




    
};













   function delet(eve){
    
        
        const id= eve.id;
        console.log(id);
       
          
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "ajaxdelete.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+id);


    var myVar = setInterval(load, 500);

function load() {

 location.reload();
}

function myStopFunction() {
  clearInterval(myVar);
}

  
    
};
     










</script>


</body>

</html>
