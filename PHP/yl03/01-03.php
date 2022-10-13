<?php
echo "Lisainfona mainiks, et peale 0301-0303 ülesannet peaks tulema umbes selline programm: <br>

funktsioon kuva_massiiv <br>
funktsioon vaheta_elemendid <br>
funktsioon kustuta_element <br>

tee massiiv <br>
kuva_massiiv <br>
vaheta_elemendid <br>
kuva_massiiv <br>
kustuta_element <br>
kuva_massiiv <br>";

function kuva_massiiv($mas) {
    echo "Massiivis on " . sizeof($mas) . " elementi.<br>";
    for ($i=0; $i<9; $i++) {
        $mas[]=$i;
        echo $i . ". " . $mas[$i] . "<p>";
    }
}

function vaheta_elemendid($e1, $e2, $mas)  {

    $ajutine = $mas[$e1];
    $mas[$e1] = $mas[$e2];
    $mas[$e2] = $ajutine;

    return $mas;
}

function kustuta_element($e1, $mas) {

    array_splice($mas, $e1, 1);
    unset($mas[9]);
    return $mas;

}

$loomad = array("Karu", "Jänes", "Hunt", "Rebane", "Hirv", "Hiir", "Põder", "Ahv", "Mäger", "Mutt");

kuva_massiiv($loomad);

$loomad = vaheta_elemendid(3, 7, $loomad);

kuva_massiiv($loomad);

$loomad = kustuta_element(1, $loomad);

kuva_massiiv($loomad);