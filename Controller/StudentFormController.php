<?php 
declare(strict_types=1);

class StudentFormController {


    public function render(array $GET, array $POST) {
        $dataLoader = new DataLoader();

        $submitValue = "Create";
        $nameValue = "";
        $emailValue = "";
        $teacherName = "";
        $studentId = "";
        $teacherId = "";
        $classId = "";
        $className = "";
        
        if(isset($GET['id']) && $GET['id'] != null){
            $studentId = $GET['id'];

            $studentInfo = $dataLoader->getStudentById((int)$studentId);
            $studentId=$studentInfo['id'];
            $nameValue = $studentInfo['name'];
            $emailValue = $studentInfo['email'];
            $teacherName = $studentInfo['tname'];
            $teacherId = $studentInfo['teacher'];
            $classId = $studentInfo['class'];
            $className = $studentInfo['cname'];
            $submitValue = 'Update';

        }

        $teachers = $dataLoader->getTeachers();
        $classes = $dataLoader->getClasses();

        require 'View/studentForm.php';
    }
}
