<?php
    class Blog{
        public function creatingPost($tittle,$body,$featured_image_name){
            include "../config/db-connect.php";
            $sql = "INSERT INTO `posts` (tittle, body, featured_image) VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$tittle,$body,$featured_image_name]);
            return $result;
        }

        public function getAllPost(){
            include "../config/db-connect.php";
            $sql="SELECT * FROM `posts` ORDER BY id DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $posts = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $posts;
        }

        public function getPostById($id){
            include "../config/db-connect.php";
            $sql="SELECT*FROM `posts`WHERE id=?";
            $stmt=$pdo->prepare ($sql);
            $stmt->execute(['$id']);
            $post=$stmt->fetch(PDO::FETCH_ASSOC);
            return $post;
        }

        public function updatePostWithoutImage($tittle,$body,$id){
            include "../config/db-connect.php";
            $sql="UPDATE `posts` SET tittle=?,body=? WHERE id=?";
            $stmt=$pdo->prepare($sql);
            $result = $stmt->execute([$tittle,$body,$id]);
            return $result;
        }

        public function updatePostWithImage($tittle,$body,$featured_image_name,$id){
            include "../config/db-connect.php";
            $sql="UPDATE `posts` SET tittle=?,body=?,featured_image=? WHERE id=?";
            $stmt=$pdo->prepare($sql);
            $result = $stmt->execute([$tittle,$body,$featured_image_name,$id]);
            return $result;
        }

        public function deletePostById($id){
            include "../config/db-connect.php";
            $sql="DELETE FROM posts WHERE id=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$id]);
            return $result;
        }
    }
    $bmw=new Blog;
    echo $bmw->getAllPost();
?>