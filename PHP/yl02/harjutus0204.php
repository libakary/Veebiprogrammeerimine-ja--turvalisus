<?php

echo "Ülesanne 0204: <br>

Lisa massiivi ühe kodaniku viis erinevat isikuandmete (nimi, vanus jne.) elementi.
Väljasta need ise püstitatud lauses, sellesama kodaniku kohta.
Nt. 'Kodanik [nimi] on [vanus] aastane'<br>";

$isikuandmed = array("Karol", "Kaljuste", "60108100022", "21", "Eesti");

echo "Lause: <br>";
echo $isikuandmed[4] . " kodanik " . $isikuandmed[0] . " " . $isikuandmed[1] . ", isikukoodiga " . $isikuandmed[2] . ", on " . $isikuandmed[3] . " aastane.";