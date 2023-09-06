<?php
    function register(){
        echo "user has been registered","<br>";
    };
    register();

    function registerUser($username){
        echo "Dear $username you have been registered","<br>";
    };
    registerUser('Abraham');


    function add($a,$b){
        return $a+$b;
    };
    $sum = add(2,5);
    echo $sum,"<br>";
    echo add(4,6),"<br>";

    
    $subtract = function($a,$b){
        return $a-$b;
    };
    echo $subtract(6,3),"<br>";


    $modulo = function($a,$b){
        return $a%$b;
    };
    echo $modulo(10,2),"<br>";


    $add = fn($a,$b) => $a+$b;
        
    echo $multiply(5,3)
?>