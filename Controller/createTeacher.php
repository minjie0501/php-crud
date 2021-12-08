<?php 
session_start();
require('../Model/Database.php');

require('../Model/Connection.php');
require('../Model/Env.php');


$connection = new Connection;
$conn = $connection->connectDB();

$submitValue = "Create";
$nameValue = "";
$emailValue ="";
$teacherId ="";


if(isset($_GET['id'])){
    $teachers = new Database($conn);
    $teacherInfo = $teachers->getTeachers($_GET['id'])[0];
    $teacherId = $teacherInfo['id'];
    $nameValue = $teacherInfo['name'];
    $emailValue = $teacherInfo['email'];
    $submitValue = 'Update';
    $_SESSION['action'] = "update";
}else{
    $_SESSION['action'] = "create";
}

// function teacherOptions($teacherId){
//     $db = new Database();
//     $teachers = $db->getTeachers();
//     for ($i=0; $i <count($teachers ) ; $i++) {
//         if($teacherId == $teachers[$i]['id']){
//             echo "<option value=".$teachers[$i]['id']." selected>".$teachers[$i]['name']."</option>";  
//         }else{
//             echo "<option value=".$teachers[$i]['id'].">".$teachers[$i]['name']."</option>";  

//         }
//     }
// }
?>