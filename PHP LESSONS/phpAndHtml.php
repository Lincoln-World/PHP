<?php
    $name="Abraham";
    $surname="Ogwuche";
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
    <p>My name is <?php echo $surname." ".$name?></p>
    <p><?php echo "My name is ${surname} ${name}"?></p>
    <p><?php echo "My name is $surname $name"?></p>
</body>
</html>