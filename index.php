<?php

declare(strict_types=1);

require 'Model/Env.php';
require 'Model/Connection.php';
require 'Model/DataLoader.php';
require 'Model/Class.php';
require 'Model/Teacher.php';
require 'Model/Student.php';

require 'Controller/HomepageController.php';
require 'Controller/ClassesController.php';
require 'Controller/ClassFormController.php';
require 'Controller/DeleteController.php';
require 'Controller/DetailsController.php';
require 'Controller/TeachersController.php';
require 'Controller/TeacherFormController.php';
require 'Controller/StudentsController.php';
require 'Controller/StudentFormController.php';


//create database with some default data if db doesn't exist
$c = new Connection();
$c->createDb();


$controller = new HomepageController();

if (isset($_GET['page']) && $_GET['page'] === 'classes') {
    $controller = new ClassesController();
} elseif (isset($_GET['page']) && $_GET['page'] === 'classForm') {
    $controller = new ClassFormController();
} elseif (isset($_GET['page']) && $_GET['page'] === 'delete') {
    $controller = new DeleteController();
} elseif (isset($_GET['page']) && ($_GET['page'] === 'details')) {
    $controller = new DetailsController();
} elseif (isset($_GET['page']) && $_GET['page'] === 'teachers') {
    $controller = new TeachersController();
} elseif (isset($_GET['page']) && $_GET['page'] === 'teacherForm') {
    $controller = new TeacherFormController();
} elseif (isset($_GET['page']) && $_GET['page'] === 'students') {
    $controller = new StudentsController();
} elseif (isset($_GET['page']) && $_GET['page'] === 'studentForm') {
    $controller = new StudentFormController();
}

$controller->render($_GET, $_POST);
