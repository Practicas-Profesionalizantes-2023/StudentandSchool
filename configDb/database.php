<?php

class Database
{
    private $hostname="db";
    private $database;
    private $username;
    private $password;
    private $charset = "utf8";

    public function __construct()
    {   
        $this->database = getenv("DB_NAME");
        $this->username = getenv("MYSQL_USER");
        $this->password = getenv("MYSQL_ROOT_PASSWORD");
    }

    public function conect()
    {
        try {
            $conection = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
         
            $pdo = new PDO($conection, $this->username, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }

  

}



?>

