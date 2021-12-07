<?php 
require('../Model/Database.php');

$submitValue = "Create";
$nameValue = "";
$emailValue ="";


if(isset($_GET['id'])){
    $db = new Database();
    $teacherInfo = $db->getTeachers($_GET['id'])[0];
    $teacherId = $teacherInfo['id'];
    $nameValue = $teacherInfo['name'];
    $emailValue = $teacherInfo['email'];
    $submitValue = 'Update';
    $_SESSION['action'] = "update";
}else{
    $_SESSION['action'] = "create";
}

?>