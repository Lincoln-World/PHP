<?php
    include "components/navbar.php";
    include "config/db-connect.php";
    $sql="SELECT * FROM `posts` ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    //needed for select
    //fetch for 1 record or fetchALL for all records
    $posts = $stmt->fetchALL(PDO::FETCH_ASSOC);
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
    <div class="container mt-3">
        <h5><?php echo date('D d F,Y   G:i:s a')?></h5>
        <marquee behavior="" direction=""><h2>Welcome to Sunshine News</h2></marquee>
        <h6>Below are stories that made Headline</h6>
        <div class="row">
            <?php foreach($posts as $post){?>
                <div class="col-md-4 mt-5">
                    <div class="card text-center shadow-sm h-100 w-100">
                        <div class="card-img-top">
                            <img :src="" alt="" class="img-fluid rounded-circle w-80 ">
                        </div>
                        <div class="card-body">
                            <h5><?php echo $post['tittle']?></h5>
                            <p class="text-truncate"><?php echo $post['body']?></p>
                            <p><?php echo $post['created']?></p>
                            <a class="btn btn-primary" href="processes/deletepost.php? id=<?php echo $post['id']?>">Delete</a>
                        </div>
                    </div>
            
                </div>
                <?php
            }?>
        </div>
        
    </div>
</body>
</html>