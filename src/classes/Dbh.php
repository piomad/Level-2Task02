<?php

namespace Acme;

use PDO;

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "user_app";

    public function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}