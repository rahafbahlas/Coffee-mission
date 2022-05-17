<?php
class DB
{

    private static ?DB $db = null;
    private mysqli $conn;

    private function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'coffee_db');
        if ($this->conn->errno) {
            die("Connection Failed to database");
        }
    }

    public static function get_db()
    {
        if (static::$db == null) {
            static::$db = new DB();
        }
        return static::$db;
    }

    public function get_connection()
    {
        return $this->conn;
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }


    public function executeUpdate($query)
    {
        return boolval($this->conn->query($query));
    }

    public function execute($query)
    {
        return $this->conn->query($query);
    }
}
