<?php

$hn = "localhost"; //host name
$db = "library"; //database
$un = "root"; //username
$pw = "Fc3ew8iw##";

class LibraryDBConnection
{
    private $_config = array(
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'library',
        'username' => 'root',
        'password' => 'Fc3ew8iw##'
    );

    public $conn;

    public function __construct()
    {
        $this->getPDOConnection();
    }

    public function __destruct()
    {
        $this->conn = NULL;
    }

    private function getPDOConnection()
    {
        if ($this->conn == NULL) {
            $dsn = "" .
                $this->_config['driver'] .
                ":host=" . $this->_config['host'] .
                ";dbname=" . $this->_config['dbname'];

            try {
                $this->conn = new PDO($dsn, $this->_config['username'], $this->_config['password']);
            } catch (PDOException $e) {
                echo __LINE__ . $e->getMessage();
            }
        }
    }
}
