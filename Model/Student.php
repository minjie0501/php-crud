<?php 
class Student{
    private $name;
    private $email;
    private $class;
    private $teacher;

public function __construct($name,$email,$class,$teacher){
    $this->name=$name;
    $this->email=$email;
    $this->class=$class;
    $this->teacher=$teacher;
}

public function getName(){
return $this->name;
}
public function getMail(){
    return $this->mail;    
}
public function getClass(){
    return $this->class;   
}
public function getTeacher(){
    return $this->teacher;    
}
}

$student= new Student("neha","neha@gmail.com","1","1");
// echo $student->getName();