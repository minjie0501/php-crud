<?php

class Connection
{
    public function connectDB()
    {
        (new DotEnv(dirname(__DIR__, 1) . '/.env'))->load();

        $conn = new mysqli(getenv('DATABASE_HOST'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'), getenv('DATABASE_DBNAME'));

        // Check connection 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            // echo "Connected successfully";
            return $conn;
        }
    }

    public function createDb():void
    {
        (new DotEnv(dirname(__DIR__, 1) . '/.env'))->load();


        $link = mysqli_connect(getenv('DATABASE_HOST'), getenv('DATABASE_USER'),  getenv('DATABASE_PASSWORD'));
        if (!$link) {
            die('Could not connect: ');
        }

        // Make my_db the current database
        $db_selected = mysqli_select_db($link, getenv('DATABASE_DBNAME'));

        if (!$db_selected) {
            // If we couldn't, then it either doesn't exist, or we can't see it.
            $sql = 'CREATE DATABASE mySchool';

            if ($link->query($sql)) {
                echo "Database mySchool created successfully\n";

                $conn = mysqli_connect(getenv('DATABASE_HOST'), getenv('DATABASE_USER'),  getenv('DATABASE_PASSWORD'), getenv('DATABASE_DBNAME'));

                $sql = "CREATE TABLE teachers(
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    name VARCHAR(50) NOT NULL,
                    email VARCHAR(80) NOT NULL,
                    PRIMARY KEY (id)
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8";

                if ($conn->query($sql) === TRUE) {
                    // echo "Table MyGuests created successfully";
                } else {
                    echo "Error creating table: " . $conn->error;
                }

                $sql = "CREATE TABLE students(
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    name VARCHAR(50) NOT NULL,
                    email VARCHAR(80) NOT NULL,
                    class INT UNSIGNED NOT NULL,
                    teacher int UNSIGNED NOT NULL,
                    PRIMARY KEY (id)
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8";

                if ($conn->query($sql)) {
                    // echo "table students created successfully\n";
                } else {
                    echo 'Error creating database: ' . $conn->error;
                }

                $sql = "CREATE TABLE classes(
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    name VARCHAR(50) NOT NULL,
                    location VARCHAR(80) NOT NULL,
                    teacher int UNSIGNED NOT NULL,
                    PRIMARY KEY (id)
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8";

                if ($conn->query($sql)) {
                    // echo "Database my_db created successfully\n";
                } else {
                    echo 'Error creating database: ';
                }

                $sql = "INSERT INTO teachers (name, email) VALUES ('John Doe', 'john@gmail.com'), ('Sarah Close', 'sarah@gmail.com'),('James Wolf', 'james@outlook.com');";
                $conn->query($sql);

                $sql = "INSERT INTO classes (name, location, teacher) VALUES ('Lamarr', 'Antwerpen', 1), ('Theano', 'Leuven', 3), ('Giertz', 'Brussels', 2);";
                $conn->query($sql);

                $sql = "INSERT INTO students (name, email, class, teacher) VALUES 
                ('Quin Amos', 'Quin@gmail.com', 1, 3), ('Regena Milo', 'Regena@outlook.com', 2, 2),
                ('Haze Beckett', 'Haze@gmail.com', 3, 1), ('Beryl Luana', 'Beryl@outlook.com', 1, 2),
                ('Mabelle Jemmy', 'Mabelle@gmail.com', 2, 3),  ('Judie Philander', 'Judie@outlook.com', 3, 1);";
                $conn->query($sql);
                
            } else {
                echo 'Error creating database: ';
            }
        }

        mysqli_close($link);
    }
}
