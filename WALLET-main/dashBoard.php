<?php
  session_start();
    if(!isset($_SESSION['email'])){
      header('location:login.php');
      exit();
    }
    include_once "classes/Account.php";
    $accountInstance=new Account();
    $userId=$_SESSION['id'];
    $balance=$accountInstance->getAccountBalance($userId);
    $_SESSION['balance']=$balance['balance'];
    $fund_records=$accountInstance->getAllFundings($userId);
    $withdraw_records=$accountInstance->getAllWithdrawals($userId);
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
    <?php include "components/navBar.php";?>
    <div class="container">
        <div class="text-end mt-2">
          <a class="text-end btn btn-danger" href="processes/signOutProcess.php">SignOut</a>
        </div>
        <b>Hello,</b> 
        <p><?php echo $_SESSION['email']?></p>
        <p>Welcome to LG WALLET</p>
        <p>Balance <b>$ <?php echo $balance['balance']?></b></p>
        <div class="text-end">
            <a href="fundWallet.php" class="btn btn-success">FundWallet</a>
            <a href="withdraw.php" class="btn btn-warning">Withdraw</a>
            <a href="#" class="btn btn-primary">TransactionHistory</a>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <h5>FUNDINGS</h5>
                <table class="table mt-2">
                    <tr>
                        <th>ID</th>
                        <th>USER_ID</th>
                        <th>AMOUNT</th>
                        <th>DATE/TIME</th>
                    </tr>
                    <?php foreach($fund_records as $fund_record){?>
                    <tr>
                        <td><?php echo $fund_record['id']?></td>
                        <td><?php echo $fund_record['userId']?></td>
                        <td><?php echo $fund_record['amount']?></td>
                        <td><?php echo $fund_record['date_of_transaction']?></td>
                    </tr>
                    <?php
                    }?>
                </table>
                <b>Total: $<?php echo implode($accountInstance->getFundingsTotal())?></b>
            </div>
            <div class="col-md-6">
              <h5>WITHDRAWALS</h5>
                <table class="table mt-2">
                        <tr>
                        <th>ID</th>
                        <th>USER_ID</th>
                        <th>AMOUNT</th>
                        <th>DATE/TIME</th>
                    </tr>
                    <?php foreach($withdraw_records as $withdraw_record){?>
                    <tr>
                        <td><?php echo $withdraw_record['id']?></td>
                        <td><?php echo $withdraw_record['userId']?></td>
                        <td><?php echo $withdraw_record['amount']?></td>
                        <td><?php echo $withdraw_record['date_of_transaction']?></td>
                    </tr>
                    <?php
                    }?>
                </table>
                <b>Total: $<?php echo implode($accountInstance->getWithdrawalsTotal())?></b>
            </div>
        </div>
</body>