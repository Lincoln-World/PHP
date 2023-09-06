<?php
$fruits=["Mango","Apple","Banana"];
echo count($fruits);
echo "<br>";

echo in_array('Apple',$fruits);
echo "<br>";

echo array_push($fruits,'PawPaw','Guava');
echo "<br>";

print_r($fruits);
echo "<br>";

echo array_unshift($fruits,'Orange');
echo "<br>";

echo array_pop($fruits);
echo "<br>";

echo array_shift($fruits);
echo "<br>";

unset($fruits[0]);
print_r($fruits);
echo "<br>";

$num1=[1,2,3];
$num2=[4,5,6];
$num3 = array_merge($num1,$num2);
var_dump ($num3);
echo "<br>";

?>