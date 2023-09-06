<?php
$numbers=[1,2,3,4,5];
echo $numbers[2],"<br>";
$colours=["red","green","blue","yellow"];
echo $colours[0],"<br>";
echo $colours[1],"<br>";
echo $colours[2],"<br>";
echo $colours[3],"<br>";
print_r ($colours);
var_dump($colours);
$colours=[
    1=>'red',
    2=>'green',
    3=>'blue',
    4=>'yellow'
];
echo $colours[1],"<br>";

$colours=[
    "first" =>'red',
    "second" =>'green',
    "third" =>'blue',
    "fourth" =>'yellow'
];
echo $colours["first"],"<br>";




$people=[
    "name"=>'Blessing',
    "gender"=>'female',
    "age"=>10,
];
[
    "name"=>'Blessed',
    "gender"=>'male',
    "age"=>20
];
[
    "name"=>'Precious',
    "gender"=>'female',
    "age"=>30,
];
echo $people["name"]
?>