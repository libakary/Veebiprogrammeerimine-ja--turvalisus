<?php
 echo "Ülesanne 0305: <br>

Teha funktsioon nimega 'string_info'. <br>
Funktsiooni sisendargumendiks olgu teksti string ($ string). <br>
Funktsioon üleb: <br>

1. Mis on selle stringi esimene täht ja viimane täht. <br>
Funkts. 'strlen' leiab stringi pikkuse ja 'echo $ string[0]' kuvab esimese tähe. <br>
2. Mitu tähte stringis on (strlen). <br>
3. Kogu string tehaks läbiva väiketähega (strtolower) ja väljastatakse. <br>
4. Kogu string tehaks läbiva suurtähega (strtoupper) ja väljastatakse. <br>
5. Tsükliga loetakse kokku ja kuvatakse ekraanile mitu 'a' tähte stringis esineb. <br>";

function string_info($string) {

    echo "1. Stringi esimene täht on: " . $string[0] . "<br>";
    echo "1. Stringi viimane täht on: " . $string[strlen($string)-1] . "<br>";

    echo "2. Stringis on ". strlen($string). " tähte. <br>";

    echo "3. String läbiva väiketähega: ". strtolower($string). "<br>";

    echo "4. String läbiva suurtähega: ". strtoupper($string). "<br>";

//    echo "5. Täht 'a' esineb stringis " . strspn($string,chr(141)) . " korda.";
//    $strArray = count_chars($string,1);
//    foreach ($strArray as $key=>$value)
//    {
//        if ($key = 141)
//        {
//            echo "The character <b>'".chr($key)."'</b> was found $value time(s)<br>";
//        }
//    }

}

function string_info_kristjan($string) {
    $result["firstletter"] = $string[0];
    $result["lastletter"] = $string[-1]; //saab viimase positsiooni tähe kohe

    $result["length"] = strlen($string);
    $result["lower"] = strtolower($string);
    $result["upper"] = strtoupper($string);

    $charCount = 0;
    for ($i=0;$i<strlen($string); $i++) {
        if($string[$i]==="a") {
            $charCount++;
        }
    }
    $result["a_count"] = $charCount;

    return $result;
}

$lause = "Hello World";

string_info($lause);

// preformat <pre>, nende vahel olev tekst kuvatakse samamoodi nagu koodis kirjas, samuti teeb seda var_dump
echo "<pre>";
var_dump(string_info_kristjan("sõne"));
echo "<pre>";