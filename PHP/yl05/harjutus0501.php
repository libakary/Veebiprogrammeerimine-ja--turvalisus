<<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ülesanne 0501</title>
</head>
<body>
<pre>
Ülesanne 0501:

Teha funktsioon nimega get_brithday. Mille sisendiks oleks isikukood ja väljundiks sünniaeg.
Isikukoodis näitab esimene nr. sugu, 2 ja 3 sünniaastat, 4 ja 5 sünnikuud, 6 ja 7 sünnipäeva ja ülejäänud numbrid 3 on suvalised ja lõpuks kontrollsumma.
Nt. kui $ik="37903250678"; siis aasta leiaks $y = "19".$ik[1].$ik[2];
Sinu isikukood on: 37903250678
Sinu sünnipäev on: 25.03.1979
Peale aastat 2000 on isikukoodi esimesed numbrid 5 ja 6.
</pre>

<?php
    function get_birthday($isikukood, $sunniaeg) {

        if ( $isikukood[0] == "3" || $isikukood[0] == "4") {
            $year = "19".$isikukood[1].$isikukood[2];
        }
        else if ( $isikukood[0] == "5" || $isikukood[0] == "6") {
            $year = "20".$isikukood[1].$isikukood[2];
        }
        else {
            $year = "error";
        }
        $month = $isikukood[3].$isikukood[4];
        $day = $isikukood[5].$isikukood[6];

        $sunniaeg = $day.".".$month.".".$year;

        return $sunniaeg;
    }

    $sunniaeg = "";
    $isikukood = "37903250678";

    echo "Sinu isikukood on: ". $isikukood."<br>";
    echo "Sinu sünnipäev on: ". get_birthday($isikukood, $sunniaeg);
?>

</body>
</html>