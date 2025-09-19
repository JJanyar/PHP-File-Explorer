<?php
$inhoud = file_get_contents('opdr_15.php'); // Pakt de content van de code
?>
<textarea><?php echo htmlentities($inhoud) ?></textarea>