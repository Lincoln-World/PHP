<?php
    include_once "classes/blog.php";
    $blog = new Blog();
    $posts= $blog->getAllpost();
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
    <?php include "components/navbar.php";?>
    <!-- <table class="table">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>body</th>
            <th>created</th>
        </tr>
        <?php foreach($posts as $post){?>
        <tr>
            <td><?php echo $post['id'];?></td>
            <td><?php echo $post['tittle'];?></td>
            <td><?php echo $post['body'];?></td>
            <td><?php echo $post['created'];?></td>
        </tr>
        <?php
        }?>
    </table> -->
    <div class="container mt-3">
        <h5><?php echo date('D d F,Y   G:i:s a')?></h5>
        <marquee behavior="" direction=""><h2>Welcome to Sunshine News</h2></marquee>
        <h6>Below are stories that made Headline</h6>
        <h5>
            <?php
                    if(isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                    }
            ?>
        </h5>
        <div class="row">
            <?php foreach($posts as $post){?>
                <div class="col-md-4 mt-5">
                    <div class="card text-center shadow-sm h-100 w-100">
                        <div class="card-img-top">
                            <img src="uploads/<?php echo $post['featured_image']; ?>" alt="" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h5><?php echo $post['tittle']?></h5>
                            <p class="text-truncate"><?php echo $post['body']?></p>
                            <p><?php echo $post['created']?></p>
                            <a class="btn btn-primary" href="post.php? id=<?php echo $post['id']?>">View more</a>
                        </div>
                    </div>
            
                </div>
                <?php
            }?>
        </div>
        
    </div>
</body>
</html>