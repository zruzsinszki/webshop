<?php 
   
   require "database.php";

   class Statement extends Database {
       
       public $dbCon;

       public function __construct($host, $user, $pwd, $dbName) {
           
           parent::__construct($host, $user, $pwd, $dbName);

           $this->dbCon = parent::connect();
           $this->dbCon->query("SET NAMES utf8");
       }

/**************************** USER ***************************/
       //user
        public function isUsernameUsed($username) {
           $stmt = $this->dbCon->prepare("SELECT COUNT(id) AS qty FROM user WHERE username LIKE ?");
           $stmt->bindParam(1, $username);
           $stmt->execute();
           $result = $stmt->fetch();
           return ($result['qty'] > 0);
       }

       public function isEmailUsed($email) {
           $stmt = $this->dbCon->prepare("SELECT COUNT(id) AS qty FROM user WHERE email LIKE ?");
           $stmt->bindParam(1, $email);
           $stmt->execute();
           $result = $stmt->fetch();
           return ($result['qty'] > 0);
       }

       public function recordNewUser($username, $password, $email) {
           $stmt = $this->dbCon->prepare("INSERT INTO user(username, password, email) VALUES (?,?,?)");
           $stmt->bindParam(1, $username);
           $stmt->bindParam(2, $password);
           $stmt->bindParam(3, $email);
           $stmt->execute();

           return ($stmt->errorCode() == "00000");
       }

      public function loginDataCheck($username, $password) {
           $stmt = $this->dbCon->prepare("SELECT COUNT(id) AS qty FROM user WHERE username LIKE ? AND password LIKE ?");
           $stmt->bindParam(1, $username);
           $stmt->bindParam(2, $password);
           $stmt->execute();
           $result = $stmt->fetch();
           return ($result['qty'] == 1);
       }

       public function getUserId($username) {
           $stmt = $this->dbCon->prepare("SELECT id FROM user WHERE username LIKE ?");
           $stmt->bindParam(1, $username);
           $stmt->execute();
           $result = $stmt->fetch();
           return $result['id'];
       }

       public function getPublicUserData($userId) {
           $stmt = $this->dbCon->prepare("SELECT username, email FROM user WHERE id=?");
           $stmt->bindParam(1, $userId);
           $stmt->execute();
           return $stmt->fetch();
       }


   }

?>