<?php
$color = '#ffffff'; // Maakt een var aan en zet de kleur naar een html code.

if (isset($_POST['color'])) {
  $color = $_POST['color']; // maakt een var aan voor de kleur.
}
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
        background-color: <?php echo $color;?>; /* zet de body color als de var wat eerder aangemaakt was. */
      }
    </style>
  </head>
  <body>
    <form method="post">  <!-- maakt een vorm aan -->
      <input type="color" name="color"> <!-- De kleur selector -->
      <input type="submit" value="Change Color"> <!-- Verander de achtergrond naar de kleur die je boven hebt geselect -->
    </form>
  </body>
</html>

