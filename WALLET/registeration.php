<?php
    include "classes/authentication.php";
    
    $authenticationInstance = new Authentication();
    if(isset($_POST['register'])){
        $email=$_POST['email'];
        $email=filter_var($email, FILTER_SANITIZE_EMAIL);
        $register=$authenticationInstance->createUser($email);
        
        // $user=$authenticationInstance->getUser($email);
        // $_SESSION['id']=$user['id'];
        // $_SESSION['email']=$user['email'];
        // $userId=$_SESSION['id'];

        // $account=$authenticationInstance->createAccount($userId);

            if($register){
                $_SESSION['success']='please login';
                header('location: login.php');
            }else{
                $_SESSION['error']='please try again';
                header('location: registeration.php');  
            }


    
    
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">    
    </head>

    <body>
        <!-- adding navbar component -->
        <?php include "components/navbar.php";?>
        <div class="container mt-5 ">
        <?php
            if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset ($_SESSION['error']);
                }
        ?>
            <form  action="registeration.php" method="post">
                <input type="email" name="email" placeholder="Enter email"  class="form-control">
                <button type="button" name="register" class="form-control btn btn-primary mt-5">SignUp</button>
                <p class="text-center">Already signed up ? <a href="login.php">SignIn</a></p>
            </form>
        </div>
    </body>
</html>