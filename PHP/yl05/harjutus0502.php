<<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ülesanne 0502</title>
</head>
<body>
<pre>
Ülesanne 0502:

Teha funktsioon nimega "est_day". Selle sisendiks olgu date funktsiooniga saadud nädalapäev. Väljundiks aga eesti keelne nädalapäev.
* Leida kuidas date funktsioon leiab nädalapäeva (http://ee.php.net/manual/en/function.date.php)
* Sisestada see funktsiooni
* Luua massiiv nt. ja leida päeva vastavus massiivi elemendile
$mas[1]="Esmaspäev";
$mas[2]="Teisipäev";
* Tagastada peaprogrammile (return) ja seal väljastada eesti keelne nädalapäeva nimetus

</pre>
    <?php

    function est_day($weekday) {
        $mas = array();
        $mas[1]="Esmaspäev";
        $mas[2]="Teisipäev";
        $mas[3]="Kolmapäev";
        $mas[4]="Neljapäev";
        $mas[5]="Reede";
        $mas[6]="Laupäev";
        $mas[7]="Pühapäev";

        return $mas[$weekday];
    }

    $weekday = date("N");

    echo "Täna on nädala ".$weekday.". päev.<br>";
    echo "Täna on ".est_day($weekday);
    ?>

</body>
</html>