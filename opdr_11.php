
<pre>
    <?php
    $alles = scandir("img/back");
    $alles = array_splice($alles, 2);

    foreach ($alles as $bestand) {
        if ($bestand != "." && $bestand != "..") { // Zorgt ervoor dat de "." en ".." worden overgeslagen als die er zijn.
            echo '<a href="?image=' . $bestand . '">' . $bestand . '</a><br>'; // Link met GET-parameter voor het weergeven van de afbeeldingen.
        }
    }

    if(isset($_GET['image'])) {
        $image = $_GET['image'];
        echo '<img src="img/back/' . $image . '" alt="' . $image . '">'; // Weergeven van de afbeelding in een <img> element.
    }
    ?>
</pre>
