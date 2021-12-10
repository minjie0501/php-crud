<?php

declare(strict_types=1);

class Student
{
    private string $name;
    private string $email;
    private int $class;
    private int $teacher;

    public function __construct(string $name,string $email, int $class, int $teacher)
    {
        $this->name = $name;
        $this->email = $email;
        $this->class = $class;
        $this->teacher = $teacher;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getClass()
    {
        return $this->class;
    }
    public function getTeacher()
    {
        return $this->teacher;
    }
}
