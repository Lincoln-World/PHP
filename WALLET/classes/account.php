<?php
    class Account{
        public function getAccountBalance($userId){
            include "config/db-connect.php";
            $sql="SELECT balance FROM account WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$userId]);
            $result=$stmt->fetch(PDO:: FETCH_ASSOC);
            return $result;
        }


        public function fundAccount($userId){
            include "config/db-connect.php";
            $sql="UPDATE account SET balance=balance+? WHERE usreId=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$userId]);
            return $result;
        }


        public function fundRecord($userId){
            include "config/db-connect.php";
            $sql="INSERT INTO fundings (amount) VALUES ? WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$userId]);
            return $result;
        }
        
        
        public function withdraw($userId){
            include "config/db-connect.php";
            $sql="UPDATE account SET balance=balance-? WHERE usreId=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$userId]);
            return $result;
        }

        public function withdrawRecord($userId){
            include "config/db-connect.php";
            $sql="INSERT INTO fundings (amount) VALUES ? WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$userId]);
            return $result;
        }



        public function getAllFundings($userId){
            include "config/db-connect.php";
            $sql="SELECT * FROM fundings WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$userId]);
            $result=$stmt->fetch(PDO:: FETCH_ASSOC);
            return $result;
        }

        public function getAllWithdrawals($userId){
            include "config/db-connect.php";
            $sql="SELECT * FROM withdrawals WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$userId]);
            $result=$stmt->fetch(PDO:: FETCH_ASSOC);
            return $result;
        }
        
    }
?>