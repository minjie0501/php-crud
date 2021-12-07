<?php
require('../Controller/createClass.php');
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
</head>

<body>
<?php include ('includes/header.php');?>

    <!-- <form action="classes.php" method="POST">
        <input type='hidden' name='id' value=<?php echo $classId; ?>>
        <input type='hidden' name='teacherId' value=<?php echo $teacherId; ?>>
        Name: <input type="text" name="name" value=<?php echo $nameValue; ?>>
        Location: <input type="text" name="location" value=<?php echo $locationValue; ?>>

        <label for="teachers">Teacher:</label>
        <select name="teachers" id="teachers">
            <?php teacherOptions($teacherId); ?>
        </select>

        <input type="submit" value=<?php echo $submitValue; ?>>
    </form> -->


    <form action="classes.php" method="POST">
        <input type='hidden' name='id' value=<?php echo $classId; ?>>
        <input type='hidden' name='teacherId' value=<?php echo $teacherId; ?>>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required value=<?php echo $nameValue; ?> >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required value=<?php echo $locationValue; ?> >
                </div>

            </div>
            <div class="form-row">
                <label for="teachers">Teacher:</label>
                <select name="teachers" id="teachers">
                    <?php teacherOptions($teacherId); ?>
                </select>
            </div>

            <div class="form-row">
                <div class="form-row" style="text-align:center;display:block;margin:auto;">
                    <input class="btn btn-primary" type="submit" value=<?php echo $submitValue; ?>>
                </div>
            </div>



    </form>
</body>

</html>