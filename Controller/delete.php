<?php 
require('../Model/Database.php');

$deleteMsg="";

if(isset($_POST['id'])  && isset($_POST['table'])){
    $db = new Database();
    $db->deleteById($_POST['table'],$_POST['id'] );

<<<<<<< HEAD
    // $deleteMsg = "You have successfully delete the " . $_POST['name'] . " class.";
    $deleteMsg = "You have successfully delete the " . $_POST['name'] . " table.";
=======
    $deleteMsg = "You have successfully deleted the " . $_POST['name'] . " class.";
>>>>>>> main
}
