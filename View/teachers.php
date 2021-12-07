<?php
include "../Model/Database.php";
include "../Model/Teacher.php";
include "../Controller/teachers.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/teachers.css">
</head>

<body>
    <div class="container">
        <div class="col-xs-6">
            <h1>Create</h1>
            <form action="login_create.php" method="post">
                <div class="form-group">
                    <label for="Name">teacher name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="CREATE">
            </form>
        </div>
        <div class="col-xs-6">
            <h1 class="page-header">
                Teachers
            </h1>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Teacher Name</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php teacherTable($teacher); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>