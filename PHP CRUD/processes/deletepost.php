<?php
    if(isset($_GET['id'])){
        require "../config/db-connect.php";
        $id=$_GET['id'];
        $sql="DELETE FROM posts WHERE id=$id";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$id]);
        header("location: ../posts.php");
    }        
?>