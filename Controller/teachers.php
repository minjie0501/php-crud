<?php
session_start();
require("../Model/Database.php");
require("../Model/Teacher.php");
require('../Model/Connection.php');
require('../Model/Env.php');


$connection = new Connection;
$conn = $connection->connectDB();

$teachers = new Database($conn);
if (isset($_SESSION['action'])) {
    if ($_SESSION['action'] == 'update') {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['id'])) {
            $values = [$_POST['name'], $_POST['email']];
            $teachers->update('teachers', $_POST['id'], $values);
            $teacher = $teachers->getTeachers();
        }
        unset($_SESSION['action']);
    } else if ($_SESSION['action'] == 'create') {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            $newTeacher = new Teacher($_POST['name'], $_POST['email']);
            // var_dump($newTeacher);
            $teachers->insertTeacher($newTeacher);
        }
        unset($_SESSION['action']);
    }
}



if(isset($_POST['search']) && $_POST['search']!=null){
    $teacher = $teachers->getTeachers(null, $_POST['search']);
}else{
    $teacher = $teachers->getTeachers();
}


function teacherTable($teacher)
{
    for ($i = 0; $i < count($teacher); $i++) {
        $teacherName = $teacher[$i]['name'];
        $teacherEmail = $teacher[$i]['email'];
        echo "<tr>";
        // echo"<td>{$teacherId}</td>";
        echo "<td><a href='../View/details.php?table=teachers&id=" . $teacher[$i]['id'] . "'>" . $teacherName . "</a></td>";

        // <td><a href='../View/details.php?table=teachers&id=" . $classes[$i]['teacherId']. "'>" . $classes[$i]['teacherName'] . "</a></td>

        echo "<td>{$teacherEmail}</td>";
        echo "<td>
                <a class='button btn btn btn-primary' href='../View/createTeacher.php?id=" . $teacher[$i]['id'] . "'>Edit</a>
            </td>";
        echo "<td>
                <form action='delete.php' method='post'>
                    <input type='hidden' name='id' value=" . $teacher[$i]['id'] . ">
                    <input type='hidden' name='name' value=" . $teacher[$i]['name'] . ">
                    <input type='hidden' name='table' value='teachers'>
                    <input class='btn btn-danger' type='submit' name='submit' value='Delete'>
                </form>
            </td>";
        echo "</tr>";
    }
}
