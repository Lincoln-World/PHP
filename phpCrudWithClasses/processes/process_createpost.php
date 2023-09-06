<?php
    if(isset($_POST['create']) || (isset($_POST['edit']))){
        session_start();
        include_once "../classes/blog.php";
        $blog = new Blog();
        
        $tittle=$_POST['tittle'];
        $body=$_POST['body'];
        $id=$_POST['id'];
        $featured_image_name = $_FILES['featured_image']['name'];
        $allowed_ext = ['png','jpg','jpeg','gif'];
        $featured_image_size = $_FILES['featured_image']['size'];
        $featured_image_tmp = $_FILES['featured_image']['tmp_name'];
        $featured_image_ext = explode('.',$featured_image_name);
        $featured_image_ext = strtolower(end($featured_image_ext));
        $featured_image_name = time().'.'.$featured_image_ext;
        $target_dir = "../uploads/{$featured_image_name}";

        //condition for creating post(image included)
        if(isset($_POST['create'])){

            if(!in_array($featured_image_ext,$allowed_ext)){
                $_SESSION['error']="Invalid file type";
                header("Location: ../create-post.php");
                exit();
            }

            if($featured_image_size>1000000){
                $_SESSION['error'] = "This file is too large";
                header("Location: ../create-post.php");
                exit();
            }

            $result1 = $blog->createPost($tittle,$body,$featured_image_name);

            move_uploaded_file($featured_image_tmp, $target_dir);

            if($result1){
                $_SESSION['success']='post created successfully';
                header("Location: ../posts.php");
            }else{
                $_SESSION['error']='Error creating post';
                header("Location: ../create-post.php");
            }
        }
        
        //condition to update post without image
        if(isset($_POST['edit'])){
            if(empty($featured_image_ext)){
                $result=$blog->updatePostWithoutImage($tittle,$body,$id);

                //condition 
            }else{
                if(!in_array($featured_image_ext,$allowed_ext)){
                    $_SESSION['error']="Invalid file type";
                    header("Location: ../create-post.php");
                    exit();
                }
    
                if($featured_image_size>1000000){
                    $_SESSION['error'] = "This file is too large";
                    header("Location: ../create-post.php");
                    exit();
                }
                
                $result=$blog->updatePostWithImage($tittle,$body,$featured_image_name,$id);
                
                move_uploaded_file($featured_image_tmp, $target_dir);
                
            }
           
            if($result){
                $_SESSION['success']='post updated successfully';
                header("Location: ../posts.php");
            }else{
                $_SESSION['error']='Error updating post';
                header("Location: ../create-post.php");
            }
        }
        
        
    }
    
    
    
?>