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
        }else{
            // echo "Connected successfully";
            return $conn;
        }
    }
}