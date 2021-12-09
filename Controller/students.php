<?php

session_start();
require('../Model/Database.php');
require('../Model/Student.php');
require('../Model/Connection.php');
require('../Model/Env.php');


$connection = new Connection;
$conn = $connection->connectDB();


$db = new Database($conn);
// var_dump($_POST);
// require("../Model/Database.php");
if (isset($_SESSION['action'])) {
    if ($_SESSION['action'] == 'update') {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['teacher']) && isset($_POST['className'])) {
            $values = [$_POST['name'], $_POST['email'], $_POST['className'], $_POST['teacher']];
            $db->update('students', $_POST['studentId'], $values);
            $students = $db->getStudents();
        }
        unset($_SESSION['action']);
    } else if ($_SESSION['action'] == 'create') {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['teacher']) && isset($_POST['className'])) {
            $student = new Student($_POST['name'], $_POST['email'], $_POST['className'], $_POST['teacher']);
            $db->insertStudent($student);
        }
        unset($_SESSION['action']);
    }
}


$students = $db->getStudents();
// var_dump($students);
function displayStudents($students)
{
    $id = 0;
    for ($i = 0; $i < count($students); $i++) {
        $id = $id + 1;
        echo "<tr>
              <th scope='row'>" . $id . "</th>
              <td><a href='../View/details.php?table=students&id=" . $students[$i]['id'] . "'>" . $students[$i]["name"] . "</a></td>
              <td>" . $students[$i]["email"] . "</td>
              <td>" . $students[$i]["className"] . "</td>
              <td><a href='../View/details.php?table=students&id=" . $students[$i]['id'] . "'>" . $students[$i]["teacherName"] . "</a></td>
             <td><a href='../View/studentForm.php?id=" . $students[$i]['id'] . "' class=' edit btn btn-primary'  id='"
            . $students[$i]['id'] . "'>Edit </a> 
              </td>
             <td>
            <form action='delete.php' method='post'>
            <input type='hidden' name='id' value=" . $students[$i]['id'] . ">
            <input type='hidden' name='name' value=" . $students[$i]['name'] . ">
            <input type='hidden' name='table' value='students'>
            <input class='btn btn-primary' type='submit' name='submit' value='Delete'>
            </form>
                </td>
            </tr>";
    }
}


if(isset($_POST['search']) && $_POST['search']!=null){
    $students = $db->getStudents(null, $_POST['search']);
}else{
    $students = $db->getStudents();
}



?>
