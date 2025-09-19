
<pre>
    <?php
    $alles = scandir("img/back");
    $alles = array_splice($alles, 2);

    foreach ($alles as $bestand) {
        if ($bestand != "." && $bestand != "..") { // Zorgt ervoor dat de "." en ".." worden overgeslagen als die er zijn.
            $bestandsnaam = str_replace(array('back_', '.png'), '', $bestand); // Dit vervangt de "back_" en ".png" voor lege plaatsen zodat ze verdwijnen.
            echo '<a href="?image=' . $bestand . '">' . $bestandsnaam . '</a><br>'; // Link met GET-parameter voor het weergeven van de afbeeldingen.
        }
    }

    if(isset($_GET['image'])) {
        $image = $_GET['image'];
        echo '<img src="img/back/' . $image . '" alt="' . $image . '">'; // Weergeven van de afbeelding in een <img> element.
    }
    ?>
</pre>
