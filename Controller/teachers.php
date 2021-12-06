<?php

$teachers = new Database();
$teacher = $teachers->getTeachers();

if (isset($_POST['delete'])) {

    $teachers->deleteTeachers();
}


function teacherTable($teacher)
{
    for($i=0; $i<count($teacher); $i++){
        $teacherId = $teacher[$i]['id'];
        $teacherName = $teacher[$i]['name'];
        $teacherEmail = $teacher[$i]['email'];
        echo "<tr>";
        echo"<td>{$teacherId}</td>";
        echo"<td>{$teacherName}</td>";
        echo"<td>{$teacherEmail}</td>";
        echo"<td><a href='teacher.php?delete={$teacherId}'>Delete</a></td>";
        echo "</tr>";
    }
}
