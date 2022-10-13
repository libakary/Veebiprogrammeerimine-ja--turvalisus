<?php

function vaheta_elemendid($e1, $e2, $mas)  {

    $ajutine = $mas[$e1];
    $mas[$e1] = $mas[$e2];
    $mas[$e2] = $ajutine;

    return $mas;
}

function kuva_massiiv($mas) {
    echo "Massiivis on " . sizeof($mas) . " elementi.<br>";
    for ($i=0; $i<10; $i++) {
        $mas[]=$i;
        echo $i . ". " . $mas[$i] . "<p>";
    }
}

$loomad = array("Karu", "Jänes", "Hunt", "Rebane", "Hirv", "Hiir", "Põder", "Ahv", "Mäger", "Mutt");

echo "Ülesanne 0303: <br>

Jätkata eelmist ülesannet. <br>

Teha funktsioon nimega 'kustuta_element'. <br>
Funktsiooni sisendargumendiks olgu massiivi elemendi nr. mille väärtust soovime kustutada ja massiiv ise. <br>
Kustutatud elemendist järgmised liikugu ühe koha võrra ettepoole. <br>
Kustuta massiivi viimane tühi element funktsiooniga unset($ mas[key]). Tagasta massiiv põhiprogrammile. <br>
Kustuta funktsiooniga element nr. 1 'Jänes'. Kuvada 'kuva_massiiv' funktsiooniga massiiv välja. <br>

Näide: <br>
Oli 0. Karu, 1. Jänes, 2. Hunt jne. <br>
Peale kustutamist olgu 0. Karu, 1. Hunt jne. <br>";

function kustuta_element($e1, $mas) {


    array_splice($mas, $e1, 1);
    unset($mas[9]);
    return $mas;

}
echo "<br>";
echo "Algmassiiv: <br>";
kuva_massiiv($loomad);

$loomad = vaheta_elemendid(3, 7, $loomad);

echo "<br>";
echo "Ahv ja Rebane vahetatud: <br>";
kuva_massiiv($loomad);

$loomad = kustuta_element(1, $loomad);

echo "<br>";
echo "Jänes kustutatud.: <br>";
kuva_massiiv($loomad);