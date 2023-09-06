<?php
    if(isset($_POST['enter'])){
        $myname=$_POST['myname'];
        $myage=$_POST['myage'];
        echo "<h4>Myname is {$myname}</h4>";
        echo "<h4>Myage is {$myage}</h4>";

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="post.php" method="post">
        <input type="text" name="myname" placeholder="full name">
        <input type="text" name="myage" placeholder="Age">
        <button type="submit" name="enter">Enter</button>
    </form>
</body>
</html>