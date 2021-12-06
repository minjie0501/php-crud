<?php

require('../Model/Database.php');

$db = new Database();
$classes = $db->getClasses();

function displayClasses($classes)
{
    for ($i = 0; $i < count($classes); $i++) {
        echo "
        <tr>
            <td>" . $classes[$i]['name'] . "</td>
            <td>" . $classes[$i]['location'] . "</td>
            <td><a href='/View/classes.php'>" . $classes[$i]['teacherName'] . "</a></td> 
            <td>
            <select name='students' onchange='location = this.value;'>
            <option ></option>
            <option value='/View/students.php'>student1</option>
            <option value='/View/students.php'>student2</option>
            </select> 
            </td>
            <td><a class='button' href=''>Edit</a></td>
            <td>
                <form action='delete.php' method='post'>
                <input type='hidden' name='name' value=" . $classes[$i]['id'] . "'>
                <input type='hidden' name='table' value='class'>
                <input type='submit' name='submit' value='Delete'>
                </form>
            </td>
        </tr>";
        // NOTE: add student list -> create getStudentsOfClass function in class class
        // Change href for teacher to go to teacher info page
    }
}
