<?php
   
    include_once "classes/blog.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $blog = new Blog();
        $post = $blog->getPostById($id);
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
    <?php  include "components/navbar.php";?>
    <div class="container">
        <img src="uploads/<?php echo $post['featured_image']?>" alt="" class="img-fluid">
        <h3><?php echo $post['tittle']?></h3>
        <p class="lead"><?php echo $post['body']?></p>
        <p><?php echo $post['created']?></p>
        <a class="btn btn-primary" href="processes/deletepost.php? id=<?php echo $post['id']?>">Delete</a>
        <a class="btn btn-primary" href="create-post.php? id=<?php echo $post['id']?>">Edit</a>
    </div>
</body>
</html>