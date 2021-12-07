<?php

$teachers = new Database();
$teacher = $teachers->getTeachers($id);

// if (isset($_POST['delete'])) {

//     $teachers->deleteTeachers();
// }


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
        // echo"<td><a href='/View/teacher.php?delete={$teacherId}'>Delete</a></td>";
        // echo "</tr>";
        echo "<td><a class='button btn btn-primary' href='/View/updateTeacher.php?id=" . $teacher[$i]['id'] . "'>Edit</a></td>";
        echo "<td><form action='delete.php' method='post'>
            <input class='btn btn-primary' type='hidden' name='id' value=" . $teacher[$i]['id'] . ">
            <input class='btn btn-primary' type='hidden' name='name' value=" . $teacher[$i]['name'] . ">
            <input class='btn btn-primary' type='hidden' name='name' value=" . $teacher[$i]['email'] . ">
            <input class='btn btn-primary' type='hidden' name='table' value='classes'>
            <input class='btn btn-primary' type='submit' name='submit' value='Delete'>
            </form></td>";
        echo "</tr>";
        
    }
}


