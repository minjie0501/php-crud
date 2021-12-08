<?php

require('../Controller/students.php'); ?>
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
    <h2 style="text-align:center;">Students-Records</h2>
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
 
  // $db= new Database();
  displayStudents($students);
  // $db->showStudent();
  

  ?> 
  </tbody>
</table>
</div> 

   <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-row" style="text-align:center;display:block;margin:auto;">
                            <a href="../View/studentForm.php" class="btn btn-primary" >CREATE</a>
                        </div>
                    </div>
                </div>
</body>
</html>