<?php

require('../Model/Database.php');
require('../Model/Class.php');

session_start();

$db = new Database();


if (isset($_SESSION['action'])) {
    if ($_SESSION['action'] == 'update') {
        if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['teachers']) && isset($_POST['id'])) {
            $values = [$_POST['name'], $_POST['location'], $_POST['teachers']];
            $db->update('classes', $_POST['id'], $values);
            $classes = $db->getClasses();
        }
        unset($_SESSION['action']);
    } else if ($_SESSION['action'] == 'create') {
        if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['teachers']) && isset($_POST['id'])) {
            $class = new SchoolClass($_POST['name'], $_POST['location'], $_POST['teachers']);
            $db->insertClass($class);
        }
        unset($_SESSION['action']);
    }
}


$classes = $db->getClasses();




function displayClasses($classes)
{
    for ($i = 0; $i < count($classes); $i++) {

        echo "
        <tr>
            <td><a href='/View/details.php?table=classes&id=" . $classes[$i]['id'] . "'>" . $classes[$i]['name'] . "</a></td>
            <td>" . $classes[$i]['location'] . "</td>
            <td><a href='/View/classes.php'>" . $classes[$i]['teacherName'] . "</a></td> 
            <td>
            <select name='students' onchange='location = this.value;'>
            <option ></option>
            <option value='/View/students.php?student=1'>student1</option>
            <option value='/View/students.php'>student2</option>
            </select> 
            </td>
            <td><a class='button' href='/View/createClass.php?id=" . $classes[$i]['id'] . "'>Edit</a></td>
            <td>
                <form action='delete.php' method='post'>
                <input type='hidden' name='id' value=" . $classes[$i]['id'] . ">
                <input type='hidden' name='name' value=" . $classes[$i]['name'] . ">
                <input type='hidden' name='table' value='classes'>
                <input type='submit' name='submit' value='Delete'>
                </form>
            </td>
        </tr>";
        // NOTE: add student list -> create getStudentsOfClass function in class class
        // Change href for teacher to go to teacher info page
    }
}
