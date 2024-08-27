<?php

class Database {
    private $connection;

    public function __construct() {
        $config = require '../config/config.php';
        $dsn = "mysql:host=" . $config['db']['host'] . ";dbname=" . $config['db']['dbname'];
        $this->connection = new PDO($dsn, $config['db']['user'], $config['db']['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
