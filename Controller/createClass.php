<?php 
require('../Model/Database.php');

$submitValue = "Create";
$nameValue = "";
$locationValue = "";
$teacherValue = "";


if(isset($_GET['id'])){
    $db = new Database();
    $classInfo = $db->getClasses($_GET['id'])[0];

    var_dump($db->getTableColumns('students'));
    $nameValue = $classInfo['name'];
    $locationValue = $classInfo['location'];
    $teacherValue = $classInfo['teacherName'];
    $submitValue = 'Update';


    
}else{
    echo('create');
}

?>