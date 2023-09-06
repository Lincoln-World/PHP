<?php
    class Blog{
            // creating a post
        public function createPost($tittle,$body,$featured_image_name){
            include "../config/db-connect.php";
            $sql = "INSERT INTO `posts` (tittle, body, featured_image) VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$tittle,$body,$featured_image_name]);
            return $result;
        }

            // to get and display all posts
        public function getAllPost(){
            include "config/db-connect.php";
            $sql="SELECT * FROM `posts` ORDER BY id DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $posts = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $posts;
        }

            // to get and display a particular post 
        public function getPostById($id){
            include "config/db-connect.php";
            $sql="SELECT*FROM `posts`WHERE id=?";
            $stmt=$pdo->prepare ($sql);
            $stmt->execute([$id]);
            $post=$stmt->fetch(PDO::FETCH_ASSOC);
            return $post;
        }

            // update a post Without adding Image
        public function updatePostWithoutImage($tittle,$body,$id){
            include "../config/db-connect.php";
            $sql="UPDATE `posts` SET tittle=?,body=? WHERE id=?";
            $stmt=$pdo->prepare($sql);
            $result = $stmt->execute([$tittle,$body,$id]);
            return $result;
        }

            // update a post With an  Image
        public function updatePostWithImage($tittle,$body,$featured_image_name,$id){
            include "../config/db-connect.php";
            $sql="UPDATE `posts` SET tittle=?,body=?,featured_image=? WHERE id=?";
            $stmt=$pdo->prepare($sql);
            $result = $stmt->execute([$tittle,$body,$featured_image_name,$id]);
            return $result;
        }

            // deleting a post
        public function deletePostById($id){
            include "../config/db-connect.php";
            $sql="DELETE FROM posts WHERE id=?";
            $stmt=$pdo->prepare($sql);
            $result=$stmt->execute([$id]);
            return $result;
        }
    }
?>