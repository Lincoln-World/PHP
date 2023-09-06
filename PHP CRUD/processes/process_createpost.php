<?php
    if(isset($_POST['create']) || (isset($_POST['edit']))){
        session_start();
        require "../config/db-connect.php";
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

            $sql = "INSERT INTO `posts` (tittle, body, featured_image) VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $result1 = $stmt->execute([$tittle,$body,$featured_image_name]);

            move_uploaded_file($featured_image_tmp, $target_dir);

            if($result1){
                $_SESSION['success']='post created successfully';
                header("Location: ../create-post.php");
            }else{
                $_SESSION['error']='Error creating post';
                header("Location: ../create-post.php");
            }
        }

        if(isset($_POST['edit'])){
            if(empty($featured_image_ext)){
                $sql="UPDATE `posts` SET tittle=?,body=? WHERE id=?";
                $stmt=$pdo->prepare($sql);
                $result = $stmt->execute([$tittle,$body,$id]);
    
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

                $sql="UPDATE `posts` SET tittle=?,body=?,featured_image=? WHERE id=?";
                $stmt=$pdo->prepare($sql);
                $result = $stmt->execute([$tittle,$body,$featured_image_name,$id]);
                
                move_uploaded_file($featured_image_tmp, $target_dir);
                
            }
           
            if($result){
                $_SESSION['success']='post updated successfully';
                header("Location: ../posts.php");
            }else{
                $_SESSION['error']='Error updating post';
                header("Location: ../posts.php");
            }
        }
        
        
    }
    
    
    
?>