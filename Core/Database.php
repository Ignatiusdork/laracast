<?php

namespace Core;

use PDO;

//connect to database and execute a query
class Database {
    
    public $connection;
    public $stmt;
    public function __construct($config, $username = 'root', $password = '') {

        $dsn =('mysql:' . http_build_query($config, '', ';'));
        
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {

        //using a prepare statment to avoid and guard from an SQL injection
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);

            return $this;
    }

    public function get() {
        return $this->stmt->fetchAll();
    }

    public function find() {
        return $this->stmt->fetch();
    }

    // return $results if it is found else if there is no note found then return a 404
    public function findOrFail() {

        $result = $this->find();

        if (! $result) {
            abort();
        }
        return $result;
    }
}