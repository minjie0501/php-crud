<?php
// require_once ('../Model/Database.php');
require('../Controller/studentForm.php');
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
    <form action="students.php" method="POST">
            <input type="hidden" name="studentId" value=<?php echo $studentId; ?>>
          <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required value=<?php echo $nameValue; ?>>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email Address</label>
              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" required value=<?php echo $emailValue; ?>>
            </div> 
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="className">Your Class Name</label>
              <select name="className" id="className" class="form-control"  aria-describedby="emailHelp" Required>
              <?php classOptions($classId); ?>
              </select>
              <!-- <input type="text" class="form-control" id="className" name="className" aria-describedby="emailHelp" required value=<?php echo $classId; ?> -->
              
            </div> 
            <div class="form-group col-md-6">
              <label for="teacher">Teacher</label>
              <select name="teacher" id="teacher" class="form-control"  aria-describedby="emailHelp" Required>
              <?php teacherOptions($teacherId); ?>
              </select>
              <!-- <input type="text" class="form-control" id="teacher" name="teacher" aria-describedby="emailHelp" Required value=<?php echo $teacherId; ?>> -->
            </div> 
          </div>
          <div class="form-row" style="text-align:center;display:block;margin:auto;">
           <!-- <a href="../View/students-record.php" class="btn btn-primary" name="saveData" value=<?php echo $submitValue; ?> >Submit</a> -->
           <input class="btn btn-primary" type="submit" value=<?php echo $submitValue; ?>>

          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

