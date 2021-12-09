<?php 
declare(strict_types = 1);

class SchoolClass{
    private string $name;
    private string $location;
    private int $teacher;

    public function __construct(string $name,string $location, int $teacher)
    {
        $this->name = $name;
        $this->location= $location;
        $this->teacher = $teacher;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getLocation(): string{
        return $this->location;
    }

    public function getTeacher(): int{
        return $this->teacher;
    }

}
?>