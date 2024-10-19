<?php

namespace App\Models\Services;

use PDO;
use PDOException;

abstract class DbConnection
{

    private string $host = "localhost";
 
    private string $user = "root";

    private string $pass = "";

    private string $dbname = "ferramentas";

    private int $port = 3306;
 
    private object $connect;

    protected function getConnection()
    {
        try { 
            $this->connect = new PDO("mysql:host={$this->host};port={$this->port};dbname=" . $this->dbname, $this->user, $this->pass);
            
            return $this->connect;
        } catch (PDOException $error) {
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador ...");
        }
    }
}
