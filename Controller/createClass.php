<?php 
require('../Model/Database.php');
session_start();


$submitValue = "Create";
$nameValue = "";
$locationValue = "";
$teacherValue = "";
$classId = "";
$teacherId = "";


if(isset($_GET['id'])){ //update class
    $db = new Database();
    $classInfo = $db->getClasses($_GET['id'])[0];
    $classId=$classInfo['id'];
    $nameValue = $classInfo['name'];
    $locationValue = $classInfo['location'];
    $teacherValue = $classInfo['teacherName'];
    $teacherId = $classInfo['teacherId'];
    $submitValue = 'Update';
    $_SESSION['action'] = "update";
}else{ //create class
    $_SESSION['action'] = "create";
}

function teacherOptions($teacherId){
    $db = new Database();
    $teachers = $db->getTeachers();
    for ($i=0; $i <count($teachers ) ; $i++) {
        if($teacherId == $teachers[$i]['id']){
            echo "<option value=".$teachers[$i]['id']." selected>".$teachers[$i]['name']."</option>";  
        }else{
            echo "<option value=".$teachers[$i]['id'].">".$teachers[$i]['name']."</option>";  

        }
    }
}

?>