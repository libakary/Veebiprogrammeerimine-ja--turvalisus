<?php

function kuva_massiiv($mas) {
    echo "Massiivis on " . sizeof($mas) . " elementi.<br>";
    for ($i=0; $i<10; $i++) {
        $mas[]=$i;
        echo $i . ". " . $mas[$i] . "<p>";
    }
}

$loomad = array("Karu", "Jänes", "Hunt", "Rebane", "Hirv", "Hiir", "Põder", "Ahv", "Mäger", "Mutt");

echo "Ülesanne 0302: <br>

Jätkata eelmist ülesannet. <br>

Teha funktsioon nimega 'vaheta_elemendid'. <br>
Funktsiooni sisendargumendiks olgu kaks massiivi elemendi numbrit, mille kohtasid massiivis soovime vahetada ja massiiv ise. <br>
Kasutada tuleb funktsioonisisest lisamuutujat. Vahetada elementide '3. Rebane' ja '7. Ahv' massiivi kohad. <br>
Tagasta massiiv põhiprogrammile. Kuvada 'kuva_massiiv' funktsiooniga massiiv välja. <br>

Näide: <br>
Rebane jääb nr. 7-ks <br>
Ahv jääb nr. 3-ks <br>";


function vaheta_elemendid($e1, $e2, $mas)  {

$ajutine = $mas[$e1];
$mas[$e1] = $mas[$e2];
$mas[$e2] = $ajutine;

	return $mas;
}

$loomad = vaheta_elemendid(3, 7, $loomad);

kuva_massiiv($loomad);