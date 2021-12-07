<?php
require ("../Model/Database.php");


$teachers = new Database();
$teacher = $teachers->getTeachers();

function teacherTable($teacher)
{
    for($i=0; $i<count($teacher); $i++){
        $teacherName = $teacher[$i]['name'];
        $teacherEmail = $teacher[$i]['email'];
        echo "<tr>";
        // echo"<td>{$teacherId}</td>";
        echo"<td>{$teacherName}</td>";
        echo"<td>{$teacherEmail}</td>";
        echo"<td>
                <select name='students'>
                    <option value='/View/students.php?student=1'>holly</option>
                    <option value='/View/students.php'>molly</option>
                </select> 
            </td>";
        echo "<td>
                <a class='button btn btn-primary' href='/View/updateTeacher.php?id=" . $teacher[$i]['id'] . "'>Edit</a>
            </td>";
        echo "<td>
                <form action='delete.php' method='post'>
                    <input type='hidden' name='id' value=" . $teacher[$i]['id'] . ">
                    <input type='hidden' name='name' value=" . $teacher[$i]['name'] . ">
                    <input type='hidden' name='table' value='teachers'>
                    <input class='btn btn-primary' type='submit' name='submit' value='Delete'>
                </form>
            </td>";
        echo "</tr>";
        
    }
}