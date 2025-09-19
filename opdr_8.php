
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<br>";
    $leeftijd = $_POST['leeftijd']; // maakt een var aan voor de leeftijd.
    $naam = $_POST['naam']; // maakt een var aan voor de naam.
    for($i = 0; $i < $leeftijd; $i++) { // // Hij herhaalt $naam de aantal keer dat $leeftijd is.
        echo $naam. "<br>";
    }
    echo "<br>";
}
?>
<!-- standaard form -->
<form method="post" action="opdr_8.php">
    Voer u naam in: <input type="text" name="naam" title="naam"><br>
    Voer u leeftijd in: <input type="text" name="leeftijd" title="leeftijd"><br>
    <input type="submit" value="Verzenden">
