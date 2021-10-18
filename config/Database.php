<?php

require 'Resthandler.php';

class Database{

    private $connection = null;
    private $host = 'localhost';
    private $db = 'dbb_todoapi';
    private $user = 'root';
    private $pass = '';
    
    public function connect() {

    try {
        
        $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this->connection;

    } catch(Exception $e)   {

        echo 'Error:' . $e->getMessage();
    }

}

    public function getConnetion() {

        return $this->connect();
    }
}

?>