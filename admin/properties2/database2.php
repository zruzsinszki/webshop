<?php

class Database {
    
    protected $host;
    protected $user;
    protected $pwd;
    protected $dbName;

    protected function __construct($host, $user, $pwd, $dbName) {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->dbName = $dbName;
    }

    protected function connect() {
        $dbCon = new PDO("mysql:dbname=$this->dbName;host=$this->host", $this->user, $this->pwd);
        return $dbCon;
    }
}

class Database2{

    public $host;
    public $user;
    public $pwd;
    public $dbname;

    public function __construct(){

        $this->host = "localhost";
        $this->user = "root";
        $this->pwd = "";
        $this->dbname = "webshop1";
    }


    public function connect(){

        $con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pwd);
        $con -> exec("SET NAMES utf8");

        return $con;
    }


}



?>