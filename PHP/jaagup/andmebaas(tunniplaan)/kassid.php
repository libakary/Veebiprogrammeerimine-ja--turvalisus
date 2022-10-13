<?php
$yhendus=new mysqli("localhost", "tunniplaan", "W25]DLxRV5rcKFlK", "tunniplaan");
$kask=$yhendus->prepare("SELECT id, kassinimi, toon FROM kassid");
$kask->bind_result($id, $kassinimi, $toon);
$kask->execute();
?>
    <!doctype html>
    <html>
    <head>
        <title>Kassid lehel</title>
    </head>
    <body>
    <h1>Kasside loetelu</h1>
    <?php

    while($kask->fetch()){

        echo "<h2 style='background: ".htmlspecialchars($toon)."'>".htmlspecialchars($kassinimi)."</h2>";
        echo "<div>".htmlspecialchars($toon)."</div>";

    }
    ?>

    </body>
    </html>

<?php
    $yhendus->close();
?>