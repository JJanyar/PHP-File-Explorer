<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inhoud = $_POST['textarea'];
    file_put_contents("opdracht17.txt", $inhoud); // Zet de tekst dat we in de textarea gaan zetten in de file opdracht17.txt.
} 
?>
<!-- 
htmlspecialchars gebruik je voor het omzetten van speciale chars (zoals < > etc.) naar html entities.
 
($_SERVER['PHP_SELF']) zorgt ervoor dat de file dat we gaan maken (opd17.txt) wordt opgeslagen op de locatie van de deze file. - pad van de huidige script. 
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<textarea name="textarea"></textarea>
<input type="submit" value="Verzenden">
</form>