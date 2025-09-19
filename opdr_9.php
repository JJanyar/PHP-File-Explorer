<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tafel = $_POST['getal']; // geeft aan dat $tafel gelijk is aan de input "getal".
    for ($tafelx = 1; $tafelx <= 10; $tafelx++){ // tafelx gaan we keer de tafel (input) doen om de complete tafel van (input) af te drukken.
        echo ($tafelx * $tafel .  "<br>");
    }
}
?>
<!-- standaard form -->
<form method="post" action="opdr_9.php">
    Voer een getal in: <input type="text" name="getal"><br>
    <input type="submit" value="Verzenden">
</form>
