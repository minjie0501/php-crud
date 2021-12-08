<?php
require("../Model/Database.php");
require("../Model/Teacher.php");
session_start();

$teachers = new Database();
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

$teacher = $teachers->getTeachers();

function teacherTable($teacher)
{
    for ($i = 0; $i < count($teacher); $i++) {
        $teacherName = $teacher[$i]['name'];
        $teacherEmail = $teacher[$i]['email'];
        echo "<tr>";
        // echo"<td>{$teacherId}</td>";
        echo "<td>{$teacherName}</td>";
        echo "<td>{$teacherEmail}</td>";
        echo "<td>
                <a class='button btn btn-info' href='../View/createTeacher.php?id=" . $teacher[$i]['id'] . "'>Edit</a>
            </td>";
        echo "<td>
                <form action='delete.php' method='post'>
                    <input type='hidden' name='id' value=" . $teacher[$i]['id'] . ">
                    <input type='hidden' name='name' value=" . $teacher[$i]['name'] . ">
                    <input type='hidden' name='table' value='teachers'>
                    <input class='btn btn-danger' type='submit' name='submit' value='X'>
                </form>
            </td>";
        echo "</tr>";
    }
}

function showTeacherStudents($teacher)
{
    for ($i = 0; $i < count($teacher); $i++) {
        $teacherId = $teacher[$i]['id'];
    }
}
