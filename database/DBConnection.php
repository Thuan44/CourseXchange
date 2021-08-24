<?php

namespace Database;

use PDO;
use PDOException;

class DBConnection
{

    private $dbName;
    private $hostName;
    private $userName;
    private $password;
    private $pdo;

    public function __construct(string $dbName, string $hostName, string $userName, string $password)
    {
        $this->dbName = $dbName;
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getPDO(): PDO
    {
        try{
            // Si this->pdo esst null, crée-moi une nouvelle instance de PDO et retourne this->pdo
            return $this->pdo ?? $this->pdo = new PDO('mysql:dbname=' . $this->dbName . ';host=' . $this->hostName, $this->userName, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer les erreurs
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Ne fetecher que des objets
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
            ]);
        }catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
