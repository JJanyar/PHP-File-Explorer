<pre>
    <?php
    $alles = scandir("img/back");
    $alles = array_splice($alles,2);

    foreach ($alles as $bestand) {
        if ($bestand != "." && $bestand != "..") { // Zorgt ervoor dat de "." en ".." worden overgeslagen als die er zijn.
            echo '<a href="img/back/' . $bestand . '">' . $bestand . '</a><br>'; // Als de bestand geen "." of ".." is, wordt er een link gemaakt voor de afbeeldingen.
        }
    }

    

    ?>
</pre>
