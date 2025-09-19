<?php
// Opdracht 6
echo "<br> Opdracht 6<br>";
$num1 = 0; // zet de var van num1 naar 0.
$num2 = 1;
$v = 0; // $v is hier onze counter.
while ($num1 < 1000){ // Hier telt het op tot met de laatste mogelijk nummer onder de 1000.
    echo $num1 . "<br>";
    $num3 = $num1 + $num2; // $num3 is hier $num1 + $num2.
    $num1 = $num2;
    $num2 = $num3;
}

// Opdracht 6
echo "<br> Opdracht 6<br>";
$num1 = 0;
$num2 = 1;
$v = 0;
while ($v < 1000){ // hier telt het 1000x op.
    echo $num1. "<br>";
    $num3 = $num1 + $num2;
    $num1 = $num2;
    $num2 = $num3;
    $v++; // Hier telt die door tot hij het 1000x heeft gedaan.
}
?>
