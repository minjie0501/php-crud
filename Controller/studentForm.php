<?php 
session_start();
require('../Model/Database.php');


$submitValue = " Create";
$nameValue = "";
$emailValue = "";
$classId = "";
$teacherId = "";
$studentId = "";


if(isset($_GET['id'])){ //update class
    $db = new Database();
    $studentInfo = $db->getStudents($_GET['id'])[0];
    $classId=$studentInfo['class'];
    $nameValue = $studentInfo['name'];
$studentId = $studentInfo['id'];

    $emailValue = $studentInfo['email'];
    $teacherId = $studentInfo['teacherId'];
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



function classOptions($classId){
    $db = new Database();
    $classes = $db->getClasses();
    for ($i=0; $i <count($classes ) ; $i++) {
        if($classId == $classes[$i]['id']){
            echo "<option value=".$classes[$i]['id']." selected>".$classes[$i]['name']."</option>";  
        }else{
            echo "<option value=".$classes[$i]['id'].">".$classes[$i]['name']."</option>";  

        }
    }
}
?>