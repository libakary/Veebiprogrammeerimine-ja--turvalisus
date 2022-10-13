<?php

$kaubad=array();
$kaubad["vorst"]="2.50";
$kaubad["juust"]="3.00";
$kaubad["kartul"]="0.45";

?>

<!doctype html>
<html>
<head>
    <title>Arvutamine</title>
</head>

<body>
<h1>Summa kalkulaator</h1>

<form action="?">
    <label for="kaup1">Kaup:</label>
    <select id="kaup1" name="hind1">
        <option value="">Vali kaup ...</option>

        <?php
        /*
        * @param $hind
        * @return string
        */

        function getSelected($requestValue, $currentValue)
        {
            $selected = "";
            if (!empty($requestValue) && $requestValue == $currentValue) {
                $selected = "selected";
            }
            return $selected;
        }

        foreach ($kaubad as $nimetus => $hind) {
            $selected = getSelected($_REQUEST["hind1"], $hind);
            echo "<option value='$hind' $selected>$nimetus</option>";
        }
        ?>

<!--
//        foreach($kaubad as $nimetus => $hind){
//            $selected = "";
//            if (!empty($_REQUEST["hind1"]) && $_REQUEST["hind1"]==$hind) {
//                $selected="selected";
//            }
//            echo "<option value='$hind' $selected>$nimetus</option>";
//        } -->

    </select>
    <label for="kogus1">Ostetav kogus:</label>
    <select id="kogus1" name="kogus1">
        <option>Vali kogus</option>
        <?php
        for ($value=1;$value<=5;$value++) {
            $selected = getSelected($_REQUEST["kogus1"],$value);
            echo "<option $selected>$value</option>";
        }
        ?>
    </select>

    <?php
    $koguhind = 0;
    if(empty($_REQUEST["hind1"]) or empty($_REQUEST["kogus1"])){
        echo "Ootan sisestust.";
    } else {
        $koguhind = $_REQUEST["hind1"]*$_REQUEST["kogus1"];
        echo "Reahind: $koguhind";
    }
    ?>
    <br>
    <label for="kaup2">Kaup:</label>
    <select id="kaup2" name="hind2">
        <option value="">Vali kaup ...</option>

        <?php
        foreach($kaubad as $nimetus => $hind){
            echo "<option value='$hind'>$nimetus</option>";
        }
        ?>

    </select>
    <label for="kogus2">Ostetav kogus:</label>
    <select id="kogus2" name="kogus2">
        <option>Vali kogus</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>

    <?php
    if(empty($_REQUEST["hind2"]) or empty($_REQUEST["kogus2"])){
        echo "Ootan sisestust.";
    } else {
        $reahind = $_REQUEST["hind2"]*$_REQUEST["kogus2"];
        echo "Reahind: $reahind";
        $koguhind += $reahind;
    }
    ?>
    <br>
    <input type="submit" value="OK" />
</form>
<?php
echo "Koguhind: $koguhind";
?>

<!-- esimene rida jääb lehekülje mälusse, teine aga kustub kui submit vajutada -->
</body>
</html>