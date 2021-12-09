<?php

declare(strict_types = 1);

class Database
{
    public object $conn;

    public function __construct(object $conn)
    {
        $this->conn = $conn;
    }


    public function getTableColumns(string $table): array{
        $sql = "DESCRIBE $table";
        $result = $this->conn->query($sql);
        $columns = [];

        while ($row = $result->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
        return $columns;
    }


  
    public function getStudents($id = null,$search = null)
    {
        if ($id == null) {
            $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname, c.name as cname from students as s
            left join teachers t on s.teacher = t.id left join classes c on c.id = s.class ";
        } else {
            $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname, c.name as cname from students as s
            left join teachers t on s.teacher = t.id left join classes c on c.id = s.class where s.id = $id";
        }
        if($search != null){
            $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname, c.name as cname from students as s
            left join teachers t on s.teacher = t.id left join classes c on c.id = s.class where s.name like '%" . $search ."%'";
        }

        $result = $this->conn->query($sql);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name'], "email" => $row['email'], "class" => $row['class'], "teacherId" => $row['teacher'], "teacherName" => $row['tname'], 'className' => $row['cname'] );
        }

        return $students;
    }


    public function getTeachers(int $id = null): array
    {
        if ($id == null) {
            $sql = "select * from teachers";
        } else {
            $sql = "select * from teachers where id = $id";
        }
        $result = $this->conn->query($sql);
        $teachers = [];

        while ($row = $result->fetch_assoc()) {
            $teachers[] = array("id" => $row['id'], "name" => $row['name'], "email" => $row['email']);
        }
        return $teachers;
    }

    public function getClasses(int $id = null, string $search = null): array
    {
        if ($id == null) {
            $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id ";
        } else {
            $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id where c.id = $id";
        }
        if($search != null){
            $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id where c.name like '%" . $search ."%'";
        }
        $result = $this->conn->query($sql);
        $classes = [];
        while ($row = $result->fetch_assoc()) {
            $classes[] = array("id" => $row['id'], "name" => $row['name'], "location" => $row['location'], "teacherId" => $row['teacher'], "teacherName" => $row['tname']);
        }
        return $classes;
    }
    public function getStudentsOfClass(int $classId){
        $sql = "select id, name from students where class = $classId";
        $result = $this->conn->query($sql);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name']);
        }
        return $students;
    }

    public function getStudentsOfTeacher(int $teacherId){
        $sql = "select id, name from students where teacher = $teacherId";
        $result = $this->conn->query($sql);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name']);
        }
        return $students;
    }
    
    public function deleteById(string $table,int $id)
    {
        $sql = "delete from $table where id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function insertStudent(object $student)
    {
        $name=$student->getName();
        $email=$student->getEmail();
        $class=$student->getClass();
        $teacher=$student->getTeacher();

        $sql = "INSERT INTO students (name, email, class, teacher)
        VALUES ('$name', '$email', '$class', '$teacher');";

        $result = $this->conn->query($sql);
        return $result;
    }


    public function insertClass(object $class)
    {
        $name=$class->getName();
        $location=$class->getLocation();
        $teacher=$class->getTeacher();

        $sql = "INSERT INTO classes (name, location, teacher)
        VALUES ('$name', '$location', '$teacher');";

        $result = $this->conn->query($sql);
        return $result;
    }

    public function insertTeacher(object $teacher)
    {
        $name=$teacher->getName();
        $email=$teacher->getEmail();

        $sql = "INSERT INTO teachers (name, email)
        VALUES ('$name', '$email');";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function update(string $table,int $id,array $values): void{
        $columns = $this->getTableColumns($table);
        array_shift($columns);

        $columnsString = "";
        for ($i=0; $i < count($columns); $i++) { 
            $columnsString .= $columns[$i] . "='" . $values[$i] . "', ";
        }
        $columnsString = substr($columnsString, 0, -2);

        $sql="UPDATE $table SET $columnsString WHERE id = $id";

        $result = $this->conn->query($sql);
    }

    public function updateDeletedIds(string $table,string $column,int $id){
        $sql = "UPDATE $table SET $column = 0 WHERE $column = $id";
        $result = $this->conn->query($sql);
        return $result;
    }
}

?>




