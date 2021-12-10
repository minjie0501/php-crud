<?php

declare(strict_types=1);

class DataLoader extends Connection
{

    public function getTableColumns(string $table): array
    {
        $columns = [];
        $sql = "DESCRIBE $table";
        $result = $this->connectDb()->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($columns, $row['Field']);
        }
        return $columns;
    }

    public function getTables(): array
    {
        $tables = [];
        $sql = "show tables;";
        $result = $this->connectDb()->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($tables, array_values($row)[0]);
        }
        return $tables;
    }

    public function getStudents($search = null): array
    {
        $students = [];

        if ($search != null) {
            $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname, c.name as cname from students as s
            left join teachers t on s.teacher = t.id left join classes c on c.id = s.class where s.name like ?";
            $result = $this->connectDb()->prepare($sql);
            $result->execute(["%$search%"]);
        } else {
            $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname, c.name as cname from students as s
            left join teachers t on s.teacher = t.id left join classes c on c.id = s.class";
            $result = $this->connectDB()->query($sql);
        }

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $students[] = array("id" => $row['id'], "name" => $row['name'], "email" => $row['email'], "class" => $row['class'], "teacherId" => $row['teacher'], "teacherName" => $row['tname'], 'className' => $row['cname']);
        }
        return $students;
    }


    public function getTeachers(string $search = null): array
    {
        $teachers = [];

        if ($search != null) {
            $sql = "SELECT * FROM teachers where teachers.name like ?";
            $result = $this->connectDb()->prepare($sql);
            $result->execute(["%$search%"]);
        } else {
            $sql = "SELECT * FROM teachers";
            $result = $this->connectDB()->query($sql);
        }

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $teachers[] = $row;
        }
        return $teachers;
    }

    public function getClasses(string $search = null): array
    {
        $classes = [];

        if ($search != null) {
            $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id where c.name like ?";
            $result = $this->connectDb()->prepare($sql);
            $result->execute(["%$search%"]);
        } else {
            $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id";
            $result = $this->connectDB()->query($sql);
        }

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $classes[] = array("id" => $row['id'], "name" => $row['name'], "location" => $row['location'], "teacherId" => $row['teacher'], "teacherName" => $row['tname']);
        }
        return $classes;
    }

    public function getClassById(int $id = null)
    {
        $sql = "select c.id, c.name, c.location, c.teacher, t.name as tname from classes c left join teachers t on c.teacher = t.id where c.id = ?";
        $result = $this->connectDb()->prepare($sql);
        $result->execute([$id]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudentById(int $id = null)
    {
        $sql = "select s.id, s.name, s.email, s.class,  s.teacher , t.name as tname, c.name as cname from students as s
        left join teachers t on s.teacher = t.id left join classes c on c.id = s.class where s.id = ?";
        $result = $this->connectDb()->prepare($sql);
        $result->execute([$id]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getTeacherById(int $id = null)
    {
        $sql = "SELECT * FROM teachers where teachers.id = ?";
        $result = $this->connectDb()->prepare($sql);
        $result->execute([$id]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudentsOfClass(int $classId): array
    {
        $students = [];
        $sql = "select id, name from students where class = ?";
        $result = $this->connectDb()->prepare($sql);
        $result->execute([$classId]);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $students[] = array("id" => $row['id'], "name" => $row['name']);
        }
        return $students;
    }

    public function getStudentsOfTeacher(int $teacherId): array
    {
        $students = [];
        $sql = "select id, name from students where teacher = ?";
        $result = $this->connectDb()->prepare($sql);
        $result->execute([$teacherId]);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $students[] = array("id" => $row['id'], "name" => $row['name']);
        }
        return $students;
    }

    public function deleteById(string $table, int $id): void
    {
        if ($table === 'classes') $sql = "DELETE FROM classes WHERE id = ?";
        if ($table === 'students') $sql = "DELETE FROM students WHERE id = ?";
        if ($table === 'teachers') $sql = "DELETE FROM teachers WHERE id = ?";

        $result = $this->connectDb()->prepare($sql);
        $result->execute([$id]);
    }

    public function insertStudent(object $student): void
    {
        $name = $student->getName();
        $email = $student->getEmail();
        $class = $student->getClass();
        $teacher = $student->getTeacher();

        $sql = "INSERT INTO students (name, email, class, teacher) VALUES (?, ?,?,?);";
        $stmt = $this->connectDb()->prepare($sql);
        $stmt->execute([$name, $email,$class, $teacher]);
    }

    public function insertClass(object $class): void
    {
        $name = $class->getName();
        $location = $class->getLocation();
        $teacher = $class->getTeacher();

        $sql = "INSERT INTO classes (name, location, teacher) VALUES(?, ?, ?)";
        $stmt = $this->connectDb()->prepare($sql);
        $stmt->execute([$name, $location, $teacher]);
    }

    public function insertTeacher(object $teacher): void
    {
        $name = $teacher->getName();
        $email = $teacher->getEmail();

        $sql = "INSERT INTO teachers (name, email) VALUES(?, ?);";
        $stmt = $this->connectDb()->prepare($sql);
        $stmt->execute([$name, $email]);
    }

    public function update(string $table, int $id, array $values)
    {
        if (in_array($table, $this->getTables())) {
            if ($table === 'classes') $sql = "UPDATE classes SET name=?, location=?, teacher=? WHERE id=?";
            if ($table === 'students') $sql = "UPDATE students SET name=?, email=?, class=?, teacher=? WHERE id=?";
            if ($table === 'teachers') $sql = "UPDATE teachers SET name=?, email=? WHERE id=?";
            $stmt = $this->connectDb()->prepare($sql);
            $stmt->execute($values);
        }
    }

    public function updateDeletedIds(string $table, string $column, int $id): void
    {
        if(in_array($table, $this->getTables())){
            if(in_array($column, $this->getTableColumns($table))){
                $sql = "UPDATE $table SET $column = 0 WHERE $column = ?";
                $stmt = $this->connectDb()->prepare($sql);
                $stmt->execute([$id]);
            }
        }
    }
}
