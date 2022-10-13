<?php

echo "Ülesanne 0301: <br>

Luua massiivi nimega 'loomad' elementidega Karu, Jänes, Hunt, Rebane, Hirv, Hiir, Põder, Ahv, Mäger, Mutt. <br>
Karu massiivi elemendi number olgu 0, Jänesel 1 jne. <br>

Teha funktsioon nimega 'kuva_massiiv'. <br>
Funktsiooni sisendargumendiks olgu massiiv mida soovime välja kuvada. <br>
Funktsiooni sees lugeda funktsiooniga 'sizeof' elemendid kokku ja väljastada tsükliga kõik masiivi elemendid üksteise alla. <br>
Kuvatud elemendi ette panna ka massiivi elemendi number. Kuvamisel panna kõige lõppu panna paragrafi tag < p >. <br>

Näide: <br>
0. Karu <br>
1. Jänes <br>
2. Hunt <br>
jne. <br>";

$loomad = array("Karu", "Jänes", "Hunt", "Rebane", "Hirv", "Hiir", "Põder", "Ahv", "Mäger", "Mutt");

function kuva_massiiv($mas) {
    echo "Massiivis on " . sizeof($mas) . " elementi.<br>";
    for ($i=0; $i<10; $i++) {
        $mas[]=$i;
        echo $i . ". " . $mas[$i] . "<p>";
    }
}
kuva_massiiv($loomad);