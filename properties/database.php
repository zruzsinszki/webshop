<?php

class Database {
    
    public $host;
    public $user;
    public $pwd;
    public $dbName;

    public function __construct() {
        $this->host = "localhost";
        $this->user = "root";
        $this->pwd = "";
        $this->dbName = "webshop1";
    }

    public function connect() {
        $dbCon = new PDO("mysql:dbname=$this->dbName;host=$this->host", $this->user, $this->pwd);
        $dbCon -> exec("SET NAMES utf8");
        return $dbCon;
    }
}

/*
class Database1{

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


}*/

?>