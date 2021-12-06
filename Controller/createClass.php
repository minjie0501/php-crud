<?php 
require('../Model/Database.php');

$submitValue = "Create";
$nameValue = "";
$locationValue = "";
$teacherValue = "";
$classId = "";
$teacherId = "";



function teacherOptions(){
    $db = new Database();
    $teachers = $db->getTeachers();
    for ($i=0; $i <count($teachers ) ; $i++) {
        echo "<option value=".$teachers[$i]['id'].">".$teachers[$i]['name']."</option>";  //auto select doesnt work when updating class
    }
}


if(isset($_GET['id'])){
    $db = new Database();
    $classInfo = $db->getClasses($_GET['id'])[0];
    $classId=$classInfo['id'];
    $nameValue = $classInfo['name'];
    $locationValue = $classInfo['location'];
    $teacherValue = $classInfo['teacherName'];
    $teacherId = $classInfo['teacherId'];
    $submitValue = 'Update';

}else{
    echo('create');
}

?>