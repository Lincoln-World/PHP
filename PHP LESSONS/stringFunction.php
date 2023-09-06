<?php
    $string="Good morning";
    echo strlen($string),"<br>";
    echo strtolower($string),"<br>";
    echo strtoupper($string),"<br>";
    echo ucwords($string),"<br>";
    echo strrev($string),"<br>";
    if(str_starts_with($string,'Good')){
        echo 'yes';
    };
?>