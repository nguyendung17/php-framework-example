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
    public static $debug = null;

    public static function Open()
    {
        if (ConnectionManager::$conn != null) {
            return ConnectionManager::$conn;
        }
        $database = ConfigManager::GetDbConfig();
        ConnectionManager::$debug = $database['debug'];
        ConnectionManager::$conn = new mysqli(
            $database['host'],
            $database['username'], $database['password'],
            $database['name']);
        if (ConnectionManager::$conn->connect_error) {
            die("Connection failed: " . ConnectionManager::$conn->connect_error);
        }
        return ConnectionManager::$conn;
    }
    public static function Close(){
        if(ConnectionManager::$conn!=null){
            ConnectionManager::$conn->close();
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

    public function raw($sql)
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
}
