<?php
    include "components/navbar.php";
    include "config/db-connect.php";
    $sql="SELECT * FROM `users`";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $users = $stmt -> fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img{
        width:100px;
        height:100px
    }
    </style>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <table class="table">
        <tr>
            <th>id</th>
            <th>fullname</th>
            <th>gender</th>   
            <th>phone</th>
            <th>email</th>
            <th>address</th>
            <th>passport</th>
        </tr>
        <?php foreach($users as $user){?>
        <tr>
            <td><?php echo $user['id']?></td>
            <td><?php echo $user['full_name']?></td>
            <td><?php echo $user['gender']?></td>
            <td><?php echo $user['phone']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['address']?></td>
            <td><?php echo '<img class="img-fluid" src="assets/images/'.$user['passport'].'">'?></td>
        </tr>
        <?php
        }?>
    </table>
    <div class="container mt-3">
        <marquee behavior="" direction=""><h2>Welcome to Sunshine News</h2></marquee>

        <div class="row">
            <?php foreach($users as $user){?>
                <div class="col-md-4 mt-5">
                    <div class="card text-center shadow-sm h-100 w-100">
                        <div class="card-img-top">
                            <img src="assets/images/<?php echo $user['passport']?>" alt="" class="img-fluid  w-80 ">
                        </div>
                        <div class="card-body">
                            <p><?php echo $user['id']?></p>
                            <h5><?php echo $user['full_name']?></h5>
                            <p><?php echo $user['gender']?></p>
                            <p><?php echo $user['phone']?></p>
                            <p><?php echo $user['email']?></p>
                            <p><?php echo $user['address']?></p>
                        </div>
                    </div>
            
                </div>
                <?php
            }?>
        </div>
    </div>
</body>
</html>