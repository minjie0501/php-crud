<?php
include "../Model/Database.php";
include "../Model/Teacher.php";


$teacher = new Database();
$teachers = $teacher->getTeachers();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
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
                    <tr>
                        <td>
                            <?php foreach ($teachers as $id => $value) {
                                echo $teachers[$id]['id'] . "<br>";
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($teachers as $id => $value) {
                                echo  $teachers[$id]['name'] . "<br>";
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($teachers as $id => $value) {
                                echo  $teachers[$id]['email'] . "<br>";
                            } ?>
                        </td>
                    </tr>

                </tbody>
            </table>


            <?php




            // var_dump($teachers[0]['name']);

            // while($row = mysqli_fetch_assoc($teachers)){
            //     $name = $row['name'];
            //     echo $name . "<br>";
            // }



            // for($i = 0; $i<= $teachers['id']; $i++){
            //     echo $teachers[$i]['name'];
            // }
            ?>
        </div>
    </div>
</body>

</html>