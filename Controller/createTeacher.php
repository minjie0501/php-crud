<?php 
require('../Model/Database.php');

$submitValue = "Create";
$nameValue = "";
$emailValue ="";


if(isset($_GET['id'])){
    $db = new Database();
    $teacherInfo = $db->getTeachers($_GET['id'])[0];

    var_dump($db->getTableColumns('students'));
    $nameValue = $teacherInfo['name'];
    $locationValue = $teacherInfo['email'];
    $submitValue = 'Update';
}else{
    echo('create');
}

?>