<?php
    session_start();
    include "../classes/Authentication.php";
    // include "../classes/account.php";
    $authenticate = new Authentication();
    if((isset($_POST['register'])) || (isset($_POST['login']))){
        
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        if(isset($_POST['register'])){
            if(empty($email)){
                header('location: ../registeration.php?msg=empty email');
                exit();
            }
            $user = $authenticate->getUserByEmail($email);
            
            if(in_array($email, $user)){
                header('location: ../registeration.php');
                exit();
            }
            $authenticate->createUser($email);
            $user=$authenticate->getUserByEmail($email);
            $userId=$user['id'];
            $authenticate->createAccount($userId);
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('location: ../login.php');
            }

        }




        if(isset($_POST['login'])){
            $user = $authenticate->getUserByEmail($email);
            if(!$user){
                header('location: ../login.php');
                
            }else{
                $_SESSION['id']=$user['id'];
                $_SESSION['email']=$user['email'];
                header('location: ../dashBoard.php');
            }
        }
    }
?>
