<?php
    if(isset($_GET['id'])){
        include_once "../classes/blog.php";
        $id=$_GET['id'];
        $blog=new Blog();
        $result=$blog->deletePostById($id);
        if($result){
            $_SESSION['success']='post deleted successfully';
            header("Location: ../posts.php");
        }else{
            $_SESSION['error']='Error deleting post';
            header("Location: ../post.php");
        }
    }        
?>