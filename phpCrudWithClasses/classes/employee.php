<?php
    class Employee{
            //getting and displaying all employees
        public function selectAllEmployees(){
            include "config/db-connect.php";
            $sql="SELECT * FROM `employees`";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
        
        //get and display all teachers by their firstName and age
        public function selectAllTeachers(){
            include "config/db-connect.php";
            $sql="SELECT  age,firstName FROM `employees` WHERE occupation='teacher'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
        
    }
 
?>