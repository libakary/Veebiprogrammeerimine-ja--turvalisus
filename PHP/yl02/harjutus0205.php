<?php

echo "Ülesanne 0205: <br>


Sisesta käsitsi 3x3 kahemõõtmeline massiiv. Massiivi elementideks pane filmide nimed.
Nt. <br>
mas[1][1]
mas[1][2]
jne. <br>

Väljasta massiiv tsükliga.<br>";

$filmid = array(
    array("Autod", "Jääaeg", "Shrek"),
    array("Autod 2", "Jääaeg 2", "Shrek 2"),
    array("Autod 3", "Jääaeg 3", "Shrek 3")
);
echo "Massiivist: <br>";
echo "Esimesed osad on nt. " . $filmid[0][0] . " ja " . $filmid[0][1] . ".<br>";
echo "Teised osad on nt. " . $filmid[1][1] . " ja " . $filmid[1][2] . ".<br>";
echo "Kolmandad osad on nt. " . $filmid[2][0] . " ja " . $filmid[2][2] . ".<br>";