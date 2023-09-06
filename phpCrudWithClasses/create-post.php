<?php
    // start a session
    session_start();
    include_once "classes/blog.php";
    // getting an id
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        // making use of a method of a class
        $blog = new Blog();
        $post = $blog->getPostById($id);
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
        <!-- adding navbar component -->
        <?php include "components/navbar.php";?>
        <div class="container mt-2">
            <?php
            // condition to echo session
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
                <!-- show edit button on my form when i click on edit on my post page and create button when i want to create post -->
                <?php if(isset($_GET['id'])){ ?>
                <button type="submit" name="edit" class="btn btn-primary form-control mt-5">Edit</button>
                <?php } else {?>
                <button type="submit" name="create" class="btn btn-primary form-control mt-5">Create</button>
                <?php }?>
            </form>
        </div>
    </body>
</html>