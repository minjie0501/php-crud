<?php
require_once ('..\Model\Database.php');
require_once ('..\Model\Student.php');
require_once ('..\Controller\students.php');
// insert record into student table
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<body>
<h3 style="text-align:center;margin-top:10px;">Students Record</h3>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
          <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email Address</label>
              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div> 
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="className">Your Class Name</label>
              <input type="text" class="form-control" id="className" name="className" aria-describedby="emailHelp" required
              >
            </div> 
            <div class="form-group col-md-6">
              <label for="teacher">Teacher</label>
              <input type="text" class="form-control" id="teacher" name="teacher" aria-describedby="emailHelp" Required>
            </div> 
          </div>
          
          <div class="form-row" style="text-align:center;display:block;margin:auto;">
           <button type="submit" class="btn btn-primary" name="saveData">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<hr>

<div class="container">   
<table id="myTable" class="table my-4" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      <th scope="col"><a href=" ">Class</a></th>
      <th scope="col"><a href=" ">Teacher</a></th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?PHP
   $database=new Database();
   echo $database->getStudents();
//    $op= new operations();
//    echo $op->store();
  ?> 
  </tbody>
</table>
</div>    

   
</body>
</html>

