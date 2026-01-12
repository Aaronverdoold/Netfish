<?php

class Database
{
    protected function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $port = 3307;
        $database = "Netfish";

        try {
            $db = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
            return $db;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}