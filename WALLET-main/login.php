<?php
    // session_start();
    // include_once "classes/authentication.php";
    // $authenticationInstance = new Authentication();
    // if(isset($_POST['login'])){
    //     $email=$_POST['email'];
    //     $user=$authenticationInstance->getUser($email);
    //     if(!$user){
    //         header('location: ../login.php?alert=you are not a registered user');
    //     }else{
    //         header('location: ../dashBoard.php');
    //     }


    // }       
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <?php include "components/navbar.php";?>
    <div class="container mt-5 ">
            <form method="post" action="processes/authenticationProcess.php">
                <input type="email" name="email" placeholder="UserEmail"  class="form-control">
                <p>Not registered?<a href="registeration.php">SignUp</a></p>
                <button type="submit" name="login" class="btn btn-primary mt-5" >SignIn</button>
            </form>
        </div>
</body>
</html>