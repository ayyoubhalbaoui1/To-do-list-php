<?php 

    
    require_once('./config/dbconfig.php');

    




    $db = new dbconfig();

 
             class operations extends dbconfig{ 

         

        // View Database Record

  public function user($id) {
            global $db;
            $stmt = $db->connection->prepare('SELECT photo FROM user where user_id = ?');
           $stmt->execute(array($id));
            $result=$stmt->fetchAll();
           return $result;

        }






        public function viewTodo($id) {
            global $db;
            $stmt = $db->connection->prepare('SELECT * FROM todolist where user_id = ? ');
           $stmt->execute(array($id));
            $result=$stmt->fetchAll();
           return $result;

        }

    public function ajax($id) {
            global $db;
            $stmt = $db->connection->prepare('SELECT * FROM task where todolist_id=? ');
           $stmt->execute(array($id));
            $result=$stmt->fetchAll();
           return $result;

        }





  public function viewList() {
            global $db;
            $stmt = $db->connection->prepare('SELECT * FROM todolist');
           $stmt->execute();
            $result=$stmt->fetchAll();
           return $result;

        }

   
   public function info($id) {
            global $db;
            $stmt = $db->connection->prepare('SELECT * FROM user where user_id=?');
           $stmt->execute(array($id));
            $result=$stmt->fetchAll();
           return $result;

        }



           // Insert Database 
                           







 function insertTask($task_text,$done,$todolist_id){
            global $db;
               
         
    $stmt = $db->connection->prepare('INSERT INTO task (task_text, done, todolist_id) VALUES (?, ?, ?)');
    $stmt->execute(array($task_text,$done,$todolist_id));
   


            if($stmt)
            {
                
                 echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                 Your Record Has Been Saved :)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }
            else
            {

                     echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                 Failed
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }
        }







function insertTodo($name,$color,$user_id){
            global $db;
               
         
    $stmt = $db->connection->prepare('INSERT INTO todolist (name,color,user_id) VALUES (?, ?, ?)');
    $stmt->execute(array($name,$color,$user_id));
   


//             if($stmt)
//             {
                
//                  echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//                  Your Record Has Been Saved :)
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
// </div>';
//             }
//             else
//             {

//                      echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//                  Failed
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
// </div>';
//             }
        }


 // --------------------------------------update data-------------------------------------------




              
      

        function updateInfo($user,$pass,$id){
            global $db;
               
         
    $stmt = $db->connection->prepare("UPDATE user SET  user_name= ?, password= ?  WHERE user_id = $id ");

    $stmt->execute(array($user,$pass));

     if ($stmt) {

            echo  "succes";
            }
   
            
     
        }
  
     function updateInfoim($photo,$id){
            global $db;
               
         
    $stmt = $db->connection->prepare("UPDATE user SET  photo= ?  WHERE user_id = $id ");

    $stmt->execute(array($photo));

     if ($stmt) {

            echo  "succes";
            }
   
            
     
        }












 function updateList($name,$color,$id){
            global $db;
               
         
    $stmt = $db->connection->prepare("UPDATE todolist SET  name= ?, color = ?  WHERE todolist_id = $id ");

    $stmt->execute(array($name,$color));

     if ($stmt) {

            echo  "succes";
            }
   
            
     
        }
  



         function updateTask($done,$id){
            global $db;
               
         
    $stmt = $db->connection->prepare("UPDATE task SET  done= ?  WHERE task_id = ? ");

    $stmt->execute(array($done,$id));

     if ($stmt) {

            echo  "succes";
            }
   
            
     
        }

     function changeTask($taskname,$taskid){
            global $db;
               
         
    $stmt = $db->connection->prepare("UPDATE task SET  task_text= ?  WHERE task_id = ? ");

    $stmt->execute(array($taskname,$taskid));

     if ($stmt) {

            echo  "succes";
            }
   
            
     
        }












          //Delete function

                 
            

        function deleteTask($id){
            global $db;
               
         
   
           $stmt = $db->connection->prepare("DELETE FROM task WHERE task_id= ?");
           $stmt->execute(array($id));


        }




   
        function deleteTodo($id){
            global $db;
               
         
   
           $stmt = $db->connection->prepare("DELETE FROM todolist WHERE todolist_id= ?");
           $stmt->execute(array($id));


        }




    
     }
            
            
   
               




?>