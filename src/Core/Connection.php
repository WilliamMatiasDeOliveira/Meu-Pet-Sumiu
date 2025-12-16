<?php

declare(strict_types=1);

namespace App\Core;

use Exception;
use PDO;
use PDOException;

require_once __DIR__ . "/../../config.php";

abstract class Connection
{

    private $host = HOST;
    private $dbname = DBNAME;
    private $user = USER;
    private $pass = PASS;

    protected PDO $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            throw new Exception("Falha na conexão: ") . $e->getMessage();
        }
    }
}
