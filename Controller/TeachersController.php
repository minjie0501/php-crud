<?php 
declare(strict_types=1);

class TeachersController {
    public function render(array $GET, array $POST) {
        $dataLoader = new DataLoader();

        // add teacher to database
        if (isset($POST['action']) && $POST['action'] == 'Create') {
            $name = $POST['name'];
            $email = $POST['email'];

            $teacher = new Teacher($name, $email);
            $dataLoader->insertTeacher($teacher);
        }

        //update teacher in database
        if (isset($POST['action']) && $POST['action'] == 'Update') {
            $id = (int)$POST['id'];
            $values = [$POST['name'], $POST['email'], $id];
            $dataLoader->update('teachers', $id, $values);
        }


        if(isset($POST['search']) && $POST['search']!= null){
            $teachers = $dataLoader->getTeachers($POST['search']);
        }else{
            $teachers = $dataLoader->getTeachers();
        }

        require 'View/teachers.php';
    }
}
?>