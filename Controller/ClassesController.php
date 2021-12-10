<?php 
declare(strict_types=1);

class ClassesController {
    public function render(array $GET, array $POST) {
        $dataLoader = new DataLoader();

        // add class to database
        if (isset($POST['action']) && $POST['action'] == 'Create') {
            $name = $POST['name'];
            $location = $POST['location'];
            $teacher = (int)$POST['teachers'];

            $class = new SchoolClass($name, $location, $teacher);
            $dataLoader->insertClass($class);
        }

        //update class in database
        if (isset($POST['action']) && $POST['action'] == 'Update') {
            $id = (int)$POST['id'];
            $values = [$POST['name'], $POST['location'], (int)$POST['teachers'], $id];
            $dataLoader->update('classes', $id, $values);
        }


        if(isset($POST['search']) && $POST['search']!= null){
            $classes = $dataLoader->getClasses($POST['search']);
        }else{
            $classes = $dataLoader->getClasses();
        }

        require 'View/classes.php';
    }
}
?>