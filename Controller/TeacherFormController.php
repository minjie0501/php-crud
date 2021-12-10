<?php 
declare(strict_types=1);

class TeacherFormController {


    public function render(array $GET, array $POST) {
        $dataLoader = new DataLoader();

        $submitValue = "Create";
        $nameValue = "";
        $emailValue = "";
        $teacherId = "";
        
        if(isset($GET['id']) && $GET['id'] != null){
            $teacherId = $GET['id'];

            $teacherInfo = $dataLoader->getTeacherById((int)$teacherId);
            $teacherId=$teacherInfo['id'];
            $nameValue = $teacherInfo['name'];
            $emailValue= $teacherInfo['email'];
            $submitValue = 'Update';
        }

        $teachers = $dataLoader->getTeachers();

        require 'View/teacherForm.php';
    }
}
