<?php
    session_start();
    include "../classes/Account.php";
    $account = new Account();
if((isset($_POST['fund'])) || (isset($_POST['withdraw']))){
        $amount=$_POST['amount'];
        $userId=$_SESSION['id'];
        $current_balance=$_SESSION['balance'];

        if(isset($_POST['fund'])){
            $fund=$account->fundAccount($amount,$userId);
            if($fund){
                $account->fundRecord($amount,$userId);
                header("location:../dashBoard.php");
            }
        }


        if(isset($_POST['withdraw'])){
            if($current_balance > $amount){
                $account->withdraw($amount,$userId);
                $account->withdrawRecord($amount,$userId);
                header("location:../dashBoard.php");
            }else{
                $_SESSION['error']="insufficient balance";
                header("Location:../dashBoard.php");
            }
        }
    }

?>