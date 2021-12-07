<?php 
require('../Model/Database.php');

$deleteMsg="";
$previousPageUrl="../";

if(isset($_POST['id'])  && isset($_POST['table'])){
    $db = new Database();
    $db->deleteById($_POST['table'],$_POST['id'] );

    $deleteMsg = "You have successfully deleted the " . $_POST['name'] . " class.";
    if($_POST['table'] == 'classes'){
        $previousPageUrl="./classes.php";
        $db->updateDeletedIds('students', 'class', $_POST['id']);
    } 
    if($_POST['table'] == 'teachers') {
        $previousPageUrl="./teachers.php";
        $db->updateDeletedIds('students', 'teacher', $_POST['id']);
        $db->updateDeletedIds('classes', 'teacher', $_POST['id']);

    }
    if($_POST['table'] == 'students') $previousPageUrl="./students.php";


}
