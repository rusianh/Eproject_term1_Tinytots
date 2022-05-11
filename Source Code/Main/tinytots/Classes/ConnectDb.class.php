<?php

class ConnectDb
{
    public static function connect()
    {
        try {
            $host = "127.0.0.1";
            $db = "tinytots";
            $user = "root";
            $pass = "";
            $port = '3306';
            $charset = 'utf8mb4';
            $dsn = 'mysql:host=' . $host . ';' . 'dbname=' . $db . ';' . 'charset=' . $charset . ';' . 'port=' . $port . ';';
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            include "error.php";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);

        }
    }
}