<nav class= "navbar navbar-expand-sm bg-dark navbar-dark">
<?php 
  $dd=$db->sql("select * from users where id_U='$id'");
  foreach($dd as $img){
   
?>
 <img src="https://www.nicepng.com/png/full/197-1973592_free-checklist-icon-png-logo-to-do-list.png<?php echo $img['photo'] ;?>" width=60px height=40px;>
  <?php } ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="addTL.php">Todo list</a>
          <a class="dropdown-item" href="addT.php">Task</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">  
      <a href="logout.php" class="btn btn-outline-success my-2 my-sm-0" >LogOut</a>
    </form>
  </div>
</nav>

      