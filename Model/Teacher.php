<?php

class Teacher{
    private $name;
    private $email;
    private $allStudents;

    function __construct($name, $email)
    {
        $this->name = $name;
        $this->email= $email;
        // $this->allStudents = $allStudents;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getAllStudents(){
        return $this->allStudents;
    }
}

?>