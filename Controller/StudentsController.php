<?php 
declare(strict_types=1);

class StudentsController {
    public function render(array $GET, array $POST) {
        $dataLoader = new DataLoader();

        // add student to database
        if (isset($POST['action']) && $POST['action'] == 'Create') {
            $name = $POST['name'];
            $email = $POST['email'];
            $class = (int)$POST['classes'];
            $teacher = (int)$POST['teachers'];

            $student = new Student($name, $email, $class, $teacher);
            $dataLoader->insertStudent($student);
        }

        //update student in database
        if (isset($POST['action']) && $POST['action'] == 'Update') {
            $id = (int)$POST['id'];
            $values = [$POST['name'], $POST['email'], (int)$POST['classes'], (int)$POST['teachers'], $id];
            $dataLoader->update('students', $id, $values);
        }

        if(isset($POST['search']) && $POST['search']!= null){
            $students = $dataLoader->getStudents($POST['search']);
        }else{
            $students = $dataLoader->getStudents();
        }

        require 'View/students.php';
    }
}
?>