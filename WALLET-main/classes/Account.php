<?php
    class Account{
        public function getAccountBalance($userId){
            include "config/db-connect.php";
            $sql="SELECT balance FROM accounts WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$userId]);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


        public function fundAccount($amount,$userId){
            include "../config/db-connect.php";
            $sql="UPDATE accounts SET balance=balance+? WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$amount,$userId]);
            return $result;
        }


        public function fundRecord($amount,$userId){
            include "../config/db-connect.php";
            $sql="INSERT INTO fundings (amount,userId) VALUES (?,?)";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$amount,$userId]);
            return $result;
        }
        
        
        public function withdraw($amount,$userId){
            include "../config/db-connect.php";
            $sql="UPDATE accounts SET balance=balance-? WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$amount,$userId]);
            return $result;
        }

        public function withdrawRecord($amount,$userId){
            include "../config/db-connect.php";
            $sql="INSERT INTO withdrawals (amount,userId) VALUES (?,?)";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$amount,$userId]);
            return $result;
        }



        public function getAllFundings($userId){
            include "config/db-connect.php";
            $sql="SELECT * FROM fundings WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$userId]);
            $result=$stmt->fetchAll(PDO:: FETCH_ASSOC);
            return $result;
        }

        public function getAllWithdrawals($userId){
            include "config/db-connect.php";
            $sql="SELECT * FROM withdrawals WHERE userId=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$userId]);
            $result=$stmt->fetchAll(PDO:: FETCH_ASSOC);
            return $result;
        }





        public function getWithdrawalsTotal(){
            include "config/db-connect.php";
            $sql="SELECT SUM(amount) FROM withdrawals";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetch(PDO:: FETCH_ASSOC);
            return $result;
        }




        public function getFundingsTotal(){
            include "config/db-connect.php";
            $sql="SELECT SUM(amount) FROM fundings";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetch(PDO:: FETCH_ASSOC);
            return $result;
        }

        
    }
?>