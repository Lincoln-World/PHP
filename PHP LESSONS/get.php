<?php
    if(isset($_GET['enter'])){
        $myname=$_GET['myname'];
        $myage=$_GET['myage'];
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
    <a href="get.php?myname=Abraham">Click to show</a>

    <form action="get.php" method="GET">
        <input type="text" name="myname" placeholder="full name">
        <input type="text" name="myage" placeholder="Age">
        <button type="submit" name="enter">Enter</button>
    </form>
</body>
</html>