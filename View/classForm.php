<?php
require('../Controller/classForm.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <scr ipt src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></scr>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/form.css">
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="container">
        <h1>Create a class</h1>
            <form action="classes.php" method="POST">
                <input type='hidden' name='id' value=<?php echo $classId; ?>>
                <input type='hidden' name='teacherId' value=<?php echo $teacherId; ?>>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value=<?php echo $nameValue; ?>>
                        </div>
                    </div>
    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required value=<?php echo $locationValue; ?>>
                        </div>
    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="teachers">Teacher: </label>
                            <select class="form-select"  name="teachers" id="teachers">
                                <?php teacherOptions($teacherId, $conn); ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-row" style="text-align:center;display:block;margin:auto;">
                                <input class="btn btn-primary" type="submit" value=<?php echo $submitValue; ?>>
                            </div>
                        </div>
                    </div>
                    </div>
            </form>
    </div>

</body>

</html>