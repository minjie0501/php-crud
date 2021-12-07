<?php

class Teacher{
    private $name;
    private $email;
    private $allStudents;

    function __construct($name, $email, $allStudents)
    {
        $this->name = $name;
        $this->email= $email;
        $this->allStudents = $allStudents;
    }

    public function getName(){
        $this->name;
    }

    public function getEmail(){
        $this->email;
    }

    public function getAllStudents(){
        $this->allStudents;
    }
}

?>