<?php
    session_start();
    include "components/navbar.php";
    include "config/db-connect.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT*FROM `posts` WHERE id =$id";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(['id']);
        $post=$stmt->fetch(PDO::FETCH_ASSOC);
    };
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
        <div class="container mt-2">
            <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset ($_SESSION['error']);
                }
            ?>
            <form class="form-control" action="processes/process_createpost.php" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="id" value="<?php if(!empty($post['id'])){ echo $post['id'];}; ?>" required class="form-control">
                <input type="text" name="tittle" value="<?php if(!empty($post['tittle'])){ echo $post['tittle'];}; ?>" required class="form-control" placeholder="Add Title">
                <textarea name="body" required  cols="30" rows="10" class="form-control mt-5" placeholder="Add Body"><?php if(!empty($post['body'])){ echo $post['body'];}; ?></textarea>
                <input type="file" name="featured_image" id="featured_image" class="form-control" placeholder="Add Image">
                <?php if(isset($_GET['id'])){ ?>
                <button type="submit" name="edit" class="btn btn-primary form-control mt-5">Edit</button>
                <?php } else {?>
                <button type="submit" name="create" class="btn btn-primary form-control mt-5">Create</button>
                <?php }?>
            </form>
        </div>
    </body>
</html>