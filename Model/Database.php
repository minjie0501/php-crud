<?php 

class Database{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "school");
    }

    public function getStudents(){
        $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname from students as s
        left join teachers t on s.teacher = t.id ";
        $result = $this->conn->query($sql);
        $students = [];

        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name'],"email" => $row['email'], "class" => $row['class'], "teacherId" => $row['teacher'], "teacherName" =>$row['tname']);
        }

        return $students;
    }

    public function getTeachers(){
        $sql = "select * from teachers";
        $result = $this->conn->query($sql);
        $teachers = [];
        
        while ($row = $result->fetch_assoc()) {
            $teachers[] = array("id" => $row['id'], "name" => $row['name'],"email" => $row['email']);
        }
        return $teachers;
    }

    public function getClasses(){
        $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id ";
        $result = $this->conn->query($sql);
        $classes = [];

        while ($row = $result->fetch_assoc()) {
            $classes[] = array("id" => $row['id'], "name" => $row['name'],"location" => $row['location'],"teacherId" => $row['teacher'], "teacherName" => $row['tname']);
        }
        return $classes;
    }



}

?>





<!-- $conn = new mysqli(getenv('DATABASE_HOST'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'), getenv('DATABASE_DBNAME'));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // echo "Connected successfully";
    return $conn;
} -->