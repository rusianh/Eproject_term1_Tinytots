<?php
class dbh
{

    //    private $host = "103.74.120.118";
    //    private $db   = "db2007g1";
    //    private $user = "db2007u1" ;
    //    private $pass = "db2007u1@123";
    //    private $port = '3306';
    //    private $charset = 'utf8mb4';

    private $host = "127.0.0.1";
    private $db   = "tinytots";
    private $user = "root";
    private $pass = "";
    private $port = '3306';
    private $charset = 'utf8mb4';



    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';' . 'dbname=' . $this->db . ';' . 'charset=' . $this->charset . ';' . 'port=' . $this->port . ';';
        $pdo =  new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //      $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
        return $pdo;
    }
}

?>
