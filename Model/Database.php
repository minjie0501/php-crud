<?php 

class Database{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "school");
    }

    public function getStudents(){
        $sql = "select * from students";
        $result = $this->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $students[] = array("id" => $row['id'], "name" => $row['name'],"email" => $row['email'], "class" => $row['class'], "teacher" => $row['teacher']);
        }
        return $students;
    }

    public function getTeachers(){
        $sql = "select * from teachers";
        $result = $this->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $teachers[] = array("id" => $row['id'], "name" => $row['name'],"email" => $row['email']);
        }
        return $teachers;
    }

    public function getClasses(){
        $sql = "select * from classes";
        $result = $this->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $classes[] = array("id" => $row['id'], "name" => $row['name'],"location" => $row['location'],"teacher" => $row['teacher']);
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