<?php
   class Authentication{

        public function createUser($email){
            include "../config/db-connect.php";
            $sql = "INSERT INTO users (email) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$email]);
            return $result;
        }


        public function createAccount($userId){
            include "../config/db-connect.php";
            $sql="INSERT INTO accounts (userId, balance) VALUES (?, 0)";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$userId]);
            return $result;
        }

        
        public function getUserByEmail($email){
            include "../config/db-connect.php";
            $sql = "SELECT * FROM users WHERE email=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
   } 
?>