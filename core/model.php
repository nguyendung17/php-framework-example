<?php
/**
 * Created by PhpStorm.
 * User: dungnv
 * Date: 11/1/17
 * Time: 1:24 PM
 */
class ConnectionManager
{
    public static $conn = null;

    public static function Open()
    {
        if (ConnectionManager::$conn != null) {
            return ConnectionManager::$conn;
        }
        ConnectionManager::$conn = new mysqli(
            ConfigManager::$database['host'],
            ConfigManager::$database['username'], ConfigManager::$database['password'],
            ConfigManager::$database['name']);
        // Check connection
        if (ConnectionManager::$conn->connect_error) {
            die("Connection failed: " . ConnectionManager::$conn->connect_error);
        }
        echo "<p>Inited DB Connection</p>";
        return ConnectionManager::$conn;
    }
    public static function Close(){
        if(ConnectionManager::$conn!=null){
            ConnectionManager::$conn->close();
            echo "Closing DB Connection";
        }

    }
}

class BaseModel
{
    private $db;
    public function __construct()
    {
        $this->db = ConnectionManager::Open();
    }

    public function query($sql)
    {
        $result = $this->db->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getAll()
    {
        $sql = "select * from $this->table";
        return $this->query($sql);
    }
}