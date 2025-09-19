<?php
// If, then & else opdrachten

// Opdracht 1
echo "Opdracht 1";
$getal1 = 1; // maakt een var aan.
if ($getal1 > 0){ // als de var groter dan 0 is:
    echo "<br>Getal 1 is groter dan 0. <br> <br>"; // Print de uitkomst.
}

// Opdracht 2
echo "Opdracht 2 ";
$getal2 = 9;
if ($getal2 > 0 && $getal2 < 10){ // als de getal groter dan 0 is & kleiner dan 10 is:
    echo "<br>Getal 2 is groter dan 0 en kleiner dan 10. <br> <br>"; // print de uitkomst.
}

// Opdracht 3
echo "Opdracht 3";
$cijfer = 6;
if ($cijfer > 0 && $cijfer < 5.5){
    echo "Je hebt een onvoldoende, namelijk" . $cijfer . "<br><br>";
}
else if ($cijfer > 5.5 && $cijfer < 10){
    echo "<br>Je hebt een voldoende! Je hebt een " . $cijfer . ".<br> <br>";
}
else {
    if ($cijfer > 0 && $cijfer < 10){
        echo "Cijfer is ongeldig. <br><br>";
    }
}

// For, foreach & while opdrachten (6 staat in zijn eigen file.)

// Opdracht 4
echo "Opdracht 4<br>";
for ($i = 0; $i <= 10; $i+= 2) {
    echo $i . "<br>";
}

// Opdracht 5
echo " <br> Opdracht 5 <br>";
$tafel = 5; // Hier geven we aan dat we de tafel van 5 willen afdrukken.
for ($tafelx = 1; $tafelx <= 10; $tafelx++){ // tafelx gaan we keer de tafel 5 doen om de complete tafel van 5 af te drukken.
    echo ($tafelx * $tafel .  "<br>");
}
?>
