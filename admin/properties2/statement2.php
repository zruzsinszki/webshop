<?php 
   
   require "database2.php";

   class Statement extends Database {
       
       private $dbCon;

       public function __construct($host, $user, $pwd, $dbName) {
           
           parent::__construct($host, $user, $pwd, $dbName);

           $this->dbCon = parent::connect();
           $this->dbCon->query("SET NAMES utf8");
       }

/**************************** ADMIN ***************************/

       //admin
       public function isAdminUsernameUsed($username) {
        $stmt = $this->dbCon->prepare("SELECT COUNT(id) AS qty FROM admin WHERE name LIKE ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($result['qty'] > 0);
        }

        public function isAdminEmailUsed($email) {
            $stmt = $this->dbCon->prepare("SELECT COUNT(id) AS qty FROM admin WHERE email LIKE ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $result = $stmt->fetch();
            return ($result['qty'] > 0);
        }

        public function recordAdminNewUser($username, $password, $email) {
            $stmt = $this->dbCon->prepare("INSERT INTO admin(name, password, email) VALUES (?,?,?)");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
            $stmt->bindParam(3, $email);
            $stmt->execute();

            return ($stmt->errorCode() == "00000");
        }

        public function loginAdminDataCheck($username, $password) {
            $stmt = $this->dbCon->prepare("SELECT COUNT(id) AS qty FROM admin WHERE name LIKE ? AND password LIKE ?");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return ($result['qty'] == 1);
        }

        public function getAdminUserId($username) {
            $stmt = $this->dbCon->prepare("SELECT id FROM admin WHERE name LIKE ?");
            $stmt->bindParam(1, $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['id'];
        }

        public function getAdminPublicUserData($userId) {
            $stmt = $this->dbCon->prepare("SELECT name, email FROM admin WHERE id=?");
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            return $stmt->fetch();
        }


   }

?>