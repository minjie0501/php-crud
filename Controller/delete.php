<?php 
require('../Model/Database.php');
require('../Model/Connection.php');
require('../Model/Env.php');


$connection = new Connection;
$conn = $connection->connectDB();

$deleteMsg="";
$previousPageUrl="../";

if(isset($_POST['id'])  && isset($_POST['table'])){
    $db = new Database($conn);
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
