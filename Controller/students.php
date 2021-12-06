<?php 
require_once ('..\Model\Database.php');
$db= new Database();

class operations extends Database{

public function store(){
    global $db;

if (isset($_POST['saveData'])) {
  
   $name=$db->check($_POST['name']);
   $email=$db->check($_POST['email']);
   $className=$db->check($_POST['className']);
   $teacher=$db->check($_POST['teacher']);
  
   if($this->insert($name,$email,$className,$teacher)){
       
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your record has been inserted successfully
  </div>";
   }

    }
  }

  public function insert($a,$b,$c,$d){
      global $db;
      $sql1 = "INSERT INTO `students` (`id`,`name`,`email`,`class`,`teacher`)VALUES ('$a', '$b','$c','$d')";
      $result1 = mysqli_query($db, $sql1); 

      if($result1){
          return true;
      }
      else{
          return false;
      }
   
  }
}


?>