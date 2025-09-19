<?php
$file = 'opdracht17.txt'; // Dit zodat we gemakkelijk de file kunnen pakken zonder elke keer opnieuw in te typen.
$inhoud = file_get_contents('opdracht17.txt'); // pakt de content van de file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bewerkt = $_POST['textarea']; // Pakt de bewerkt inhoud van de textarea.
    file_put_contents($file, $bewerkt); // Zet de bewerkte inhoud van de textarea in de $file (opdracht17.txt).
}
?>
<!-- 
htmlspecialchars gebruik je voor het omzetten van speciale chars (zoals < > etc.) naar html entities.

htmlentities is het tegen over gestelde van htmlspecialchars(), htmlentities zorgt ervoor dat speciale chars zoals < > & etc.) geconvert worden naar html entities, bijv '>'.

($_SERVER['PHP_SELF']) zorgt ervoor dat de file dat we gaan maken (opd17.txt) wordt opgeslagen op de locatie van de deze file. - pad van de huidige script. 
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<textarea name="textarea"><?php echo htmlentities($inhoud) ?></textarea> <!-- zet de content van de file in de textarea -->
<input type="submit" value="Verzenden">
</form>
