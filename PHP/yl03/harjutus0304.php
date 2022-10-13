<?php

echo "Ülesanne 0304: <br>

Kasutades arikmeetilist tehet moodul teha funktsioon nimega 'nr_info', mille sisendargumendiks on täisarv ja mis: <br>

1. Teatab kasutajale kas tegu on paaris või paaritu arvuga. <br>
	Mooduli näide: <br>
	12%2=0 <br>
	13%2=1 <br>
	14%2=0 <br>
2. Teatab kasutajale kas arv on suurem või väiksem kui 10. <br>
3. Teatab kasutajale kas arv on suurem või väiksem kui 100. <br>
4. Näitab kasutajale arvu ruudus. <br>
5. Näitab kasutajale arvust ruutjuurt. <br>

Käivita funktsioon 5 korda sisestades arvudeks: 1, 8, 9, 15, 200 <br>";

function nr_info($arv) {
    if ($arv%2 == 0) {
        echo "1. Tegu on paarisarvuga. <br>";
    }
    else if ($arv%2 != 0) {
        echo "1. Tegu on paaritu arvuga. <br>";
    }

    if ($arv < 10) {
        echo "2. Arv on väiksem kui 10. <br>";
    }
    else if ($arv > 10) {
        echo "2. Arv on suurem kui 10. <br>";
    }
    else if ($arv = 10) {
        echo "2. Arv on võrdne 10-ga. <br>";
    }

    if ($arv < 100) {
        echo "3. Arv on väiksem kui 100. <br>";
    }
    else if ($arv > 100) {
        echo "3. Arv on suurem kui 100. <br>";
    }
    else if ($arv = 100) {
        echo "3. Arv on võrdne 100-ga. <br>";
    }

    echo "4. Arv ruudus on " . $arv*$arv . ". <br>";
    echo "5. Arvu ruutjuur on " . sqrt($arv) . ". <br>";

}

$taisarv = 2;
//readline("Sisesta arv: <br>"); readline ei tööta kui on online php, sest meil pole kasutajat.

nr_info($taisarv);