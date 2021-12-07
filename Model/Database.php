<?php

class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "school");
    }


    public function getTableColumns($table){
        $sql = "DESCRIBE $table";
        $result = $this->conn->query($sql);
        $columns = [];

        while ($row = $result->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
        return $columns;
    }

    public function getStudents($id = null)
    {
        if ($id == null) {
            $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname from students as s
            left join teachers t on s.teacher = t.id ";
        } else {
            $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname from students as s
            left join teachers t on s.teacher = t.id where s.id = $id";
        }

        $result = $this->conn->query($sql);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name'], "email" => $row['email'], "class" => $row['class'], "teacherId" => $row['teacher'], "teacherName" => $row['tname']);
        }

        return $students;
    }


    public function getTeachers($id = null)
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

    public function getClasses($id = null)
    {
        if ($id == null) {
            $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id ";
        } else {
            $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id where c.id = $id";
        }
        $result = $this->conn->query($sql);
        $classes = [];
        while ($row = $result->fetch_assoc()) {
            $classes[] = array("id" => $row['id'], "name" => $row['name'], "location" => $row['location'], "teacherId" => $row['teacher'], "teacherName" => $row['tname']);
        }
        return $classes;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function getStudentsOfClass($classId){
        $sql = "select id, name from students where class = $classId";
        $result = $this->conn->query($sql);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name']);
        }
        return $students;
    }

    public function getStudentsOfTeacher($teacherId){
        $sql = "select id, name from students where teacher = $teacherId";
        $result = $this->conn->query($sql);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name']);
        }
        return $students;
    }

>>>>>>> 4de45e81d021de5415910d5bca26beea348e8978
    public function deleteById($table, $id)
    {
        $sql = "delete from $table where id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function insertStudent($student)
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


    public function insertClass($class)
    {
        $name=$class->getName();
        $location=$class->getLocation();
        $teacher=$class->getTeacher();

        $sql = "INSERT INTO classes (name, location, teacher)
        VALUES ('$name', '$location', '$teacher');";

        $result = $this->conn->query($sql);
        return $result;
    }
=======
    
>>>>>>> shreejan


    public function insertTeacher($teacher)
    {
        $name=$teacher->getName();
        $email=$teacher->getEmail();

        $sql = "INSERT INTO teachers (name, email)
        VALUES ('$name', '$email');";

        $result = $this->conn->query($sql);
        return $result;
    }

    public function update($table,$id,$values){
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

    
}

?>




