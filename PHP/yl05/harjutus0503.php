<<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ülesanne 0503</title>
</head>
<body>
<pre>
Ülesanne 0503:

Teha üks funktsioon nimega "fun_math". Funktsiooni sisend argumentideks on kolm arvu $a, $b, $c.
Väljastada funktsiooni resultaat kõigi kirjeldatud situatsioonide puhul, kõigil puhkudel peaksid erinevad arvud olema. Väljastada ka sisendarvud.

* kui $a on väiksem kui $b siis lahutada $b-st $a ja liita $c pöördväärtus (teispidine märk)
* Kui $a on suurem kui $b siis ja kumbki pole 0 siis võtta $a astmesse $b
* Kui $a on võrdne $b-ga siis liita $a-le juurde $c ja lahutada $b-st $c ja saadud arvud omavahel kokku liita
* Kui $a korrutis $b-ga on võrdne $c-ga siis lahutada $c-st kahekordne $a ja $b korrutis
* Kui $a on suurem kui $b ja kui $b on suurem kui $c ja ükski nendest ei võrdu nulli ega negatiivse arvuga, siis liita kaks suuremat arvu ja jagada väikseima arvuga.

Proovida funktsiooni 10 erineva sisendarvudega.
</pre>

    <?php
        function fun_math($a,$b,$c) {

            echo "Esimene sisend on ".$a."<br>";
            echo "Teine sisend on ".$b."<br>";
            echo "Kolmas sisend on ".$c."<br>";

            if ($a < $b) {
                echo "a &lt; b ehk $b - $a + 1/$c = " . (($b - $a) + (1 / $c)) ."<br>";
            }
            if ($a > $b && $a != 0 && $b != 0) {
                echo "a &gt; b ja kumbki ei = 0 ehk võtan $a astmesse $b = ".pow($a,$b)."<br>";
            }
            if ($a == $b){
                echo "a = b ehk ($a + $c) + ($b - $c) = ".(($a + $c) + ($b - $c))."<br>";
            }
            if ($a*$b == $c) {
                echo "a * b = c ehk $c - 2*($a*$b) = " .($c - 2*($a*$b))."<br>";
            }
            if ($a > $b && $b > $c && $a > 0 && $b > 0 && $c > 0 ) {

                $vaikseim = min($a,$b,$c);
                $x = 0;
                $y = 0;
                if ($vaikseim == $a) {
                    $x = $b;
                    $y = $c;
                }
                else if ($vaikseim == $b) {
                    $x = $a;
                    $y = $c;
                }
                else if ($vaikseim == $c) {
                    $x = $a;
                    $y = $b;
                }
                echo "a &gt; b &gt; c ja kõik on suuremad kui 0 ehk liidan suuremad arvud ja jagan väikseimaga ($x + $y) / $vaikseim  = ".($x + $y) / $vaikseim."<br>";

            }
        }

        $a = 5;
        $b = 4;
        $c = 3;
        fun_math($a,$b,$c);

    ?>

</body>
</html>