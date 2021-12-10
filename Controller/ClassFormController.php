<?php 
declare(strict_types=1);

class ClassFormController {


    public function render(array $GET, array $POST) {
        $dataLoader = new DataLoader();

        $submitValue = "Create";
        $nameValue = "";
        $locationValue = "";
        $teacherValue = "";
        $classId = "";
        $teacherId = "";
        
        if(isset($GET['id']) && $GET['id'] != null){
            $classId = $GET['id'];

            $classInfo = $dataLoader->getClassById((int)$classId);
            $classId=$classInfo['id'];
            $nameValue = $classInfo['name'];
            $locationValue = $classInfo['location'];
            $teacherValue = $classInfo['tname'];
            $teacherId = $classInfo['teacher'];
            $submitValue = 'Update';
        }

        $teachers = $dataLoader->getTeachers();

        require 'View/classForm.php';
    }
}
