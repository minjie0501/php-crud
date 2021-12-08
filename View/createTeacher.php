<?php
require('../Controller/createTeacher.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create teacher</title>
    <link rel="stylesheet" href="styles/teachers.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <div class="col-xs-6">
            <h1 class="page-header">
                New Teachers
            </h1>
            <form action="teachers.php" method="POST">
                <input type='hidden' name='id' value=<?php echo $teacherId; ?>>
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control" required value=<?php echo $nameValue; ?>>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" class="form-control" required value=<?php echo $emailValue; ?>>
                </div>
                <input class="btn btn-primary" type="submit" value=<?php echo $submitValue; ?>>
            </form>
        </div>
    </div>
</body>

</html>