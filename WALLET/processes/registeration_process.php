<!-- <?php
    include "../classes/authentication.php";
    
    $authenticationInstance = new Authentication();
    if(isset($_POST['register'])){
        $email=$_POST['email'];
        $email=filter_var($email, FILTER_SANITIZE_EMAIL);
        $register = $authenticationInstance->createUser($email);
        
        if(!$email){
            header('location: ../register.php');
        }else{
            header('location: ../login.php');
        }


        $userId=$_SESSION['id'];
        $account=$authenticationInstance->createAccount($userId);
            if($register){
                $_SESSION['success']='please login';
                header('location: ../login.php');
            }else{
                $_SESSION['error']='please try again';
                header('location: ../registeration.php');  
            }


    
    
    }
?> -->