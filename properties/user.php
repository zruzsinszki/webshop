<?php

    require "statement.php";

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PWD', '');
    define('DBNAME', 'webshop1');

    class User {
        private $statement;
        public $username;
        public $email;

        public function __construct() {
            $this->statement = new Statement(HOST, USER, PWD, DBNAME);
        }

        public function registrate($username, $email, $password1, $password2) {
            $msg = ""; 

            try {
                $this->usernameLengthCheck($username);
            }
            catch(Exception $e) {
                $msg .= $e->getMessage();
            }

            $msg .= ($this->statement->isUsernameUsed($username)) ? " <li>A választott felhasználónév foglalt!</li> " : "";

            try {
                $this->emailLengthCheck($email);
            }
            catch(Exception $e) {
                $msg .= $e->getMessage();
            }

            
            $msg .= ($this->statement->isEmailUsed($email)) ? " <li>A megadott e-mail címmel már regisztráltak!</li> " : "";

            try {
                $this->passwordLengthCheck($password1);
                $this->passwordEqualityCheck($password1, $password2);
            }
            catch(Exception $e) {
                $msg .= $e->getMessage();
            }

            if($msg == "") {
                $msg .= (!$this->statement->recordNewUser($username, hash('sha512', $password1), $email)) ? " <li>A regisztráció sikertelen! (Belső hiba)</li> " : "";
            }

            $msg = ($msg == "") ? 
            " <h5 class='text-success'>Sikeres Regisztráció!</h5> <a class='mb-3 d-block' href='login.php'>Tovább a bejelentkezésre!</a>"
            : "<ul>".$msg."</ul>";

            return $msg;
        }

        public function login($username, $password) {
            if($this->statement->loginDataCheck($username, hash("sha512", $password))) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['userId'] = $this->statement->getUserId($username);
            } else {
                throw new Exception(' <h4>Hibás belépési adatok!</h4> ');
            }
        }

        public function loginCheck() {
            session_start();
            $userData = $this->statement->getPublicUserData($_SESSION['userId']);
            if(!empty($userData)) {
                $this->username = $userData['username'];
                $this->email = $userData['email'];
                return true;
            } else {
                return false;
            }
        }

        public function logout() {
            session_start();
            unset($_SESSION['login']);
            unset($_SESSION['userId']);
        }

        private function usernameLengthCheck($username) {
            if(strlen($username) < 6) {
                throw new Exception(' <li>A felhasználónév túl rövid! (min. 6 karakter)</li> ');
            } else if(strlen($username) > 20) {
                throw new Exception(' <li>A felhasználónév túl hosszú! (max. 20 karakter)</li> ');
            }
        }

        private function emailLengthCheck($email) {
            if(strlen($email) < 6) {
                throw new Exception(' <li>A e-mail cím túl rövid! (min. 6 karakter)</li> ');
            } else if(strlen($email) > 50) {
                throw new Exception(' <li>A e-mail cím túl hosszú! (max. 50 karakter)</li> ');
            }
        }

        private function passwordLengthCheck($password) {
            if(strlen($password) < 6) {
                throw new Exception(' <li>A jelszó túl rövid! (minimum 6 karakter)</li> ');
            }
        }

        private function passwordEqualityCheck($password1, $password2) {
            if($password1 != $password2) {
                throw new Exception(' <li>A két jelszó nem egyezik!</li> ');
            }
        }
    }

    

    
?>