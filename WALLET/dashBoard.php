<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location: login.php');
}
    // include_once "classes/account.php";
    // $accountInstance=new Account();
    // $fund_records=$accountInstance->getAllFundings();
    // $withdraw_records=$accountInstance->getAllWithdrawals();
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
        <b>Hello,</b> 
        <p><b>email</b></p>
        <p>Welcome to LG WALLET</p>
        <p>Balance <b>£</b></p>
        <div class="">
            <a href="fundWallet.php" class="btn btn-primary">FundWallet</a>
            <a href="withdraw.php" class="btn btn-primary">Withdraw</a>
            <a href="#" class="btn btn-primary">TransactionHistory</a>
        </div>
        <div class="d-flex">
            <div>
                <h5>WITHDRAWALS</h5>
                <table class="table-striped">
                    <tr>
                        <th>ID</th>
                        <th>USER_ID</th>
                        <th>AMOUNT</th>
                        <th>DATE/TIME</th>
                    </tr>
                    <tr>
                    <?php foreach($fund_records as $records)?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div>
                <h5>WITHDRAWALS</h5>
                <table class="table-striped">
                        <tr>
                        <th>ID</th>
                        <th>USER_ID</th>
                        <th>AMOUNT</th>
                        <th>DATE/TIME</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </div> -->
    <!-- Button trigger modal -->


</body>