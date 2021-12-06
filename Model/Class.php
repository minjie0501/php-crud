<?php 

class SchoolClass{
    private $name;
    private $location;
    private $teacher;

    public function __construct($name, $location, $teacher)
    {
        $this->name = $name;
        $this->location= $location;
        $this->teacher = $teacher;
    }

    public function getName(){
        return $this->name;
    }

    public function getLocation(){
        return $this->location;
    }

    public function getTeacher(){
        return $this->teacher;
    }

}
?>