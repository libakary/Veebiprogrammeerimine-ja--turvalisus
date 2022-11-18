<?php
require("../dbConfig.php");
global $yhendus;

// pikk if sellele et kas lisatakse või eemaldatakse punkte
if(isSet($_REQUEST["heaband_id"]) or
    isSet($_REQUEST["paremband_id"]) or
    isSet($_REQUEST["parimband_id"]) or
    isSet($_REQUEST["viletsband_id"])) {
    // ?? coalescing operator alla 7 phps ?? ei tööta.
    $bandi_id = $_REQUEST["heaband_id"]??
                $_REQUEST["paremband_id"]??
                $_REQUEST["parimband_id"]??
                $_REQUEST["viletsband_id"];
    $lisa = isset($_REQUEST["viletsband_id"]) ? -1:
            (isSet($_REQUEST["heaband_id"]) ? 1 :
            (isSet($_REQUEST["paremband_id"]) ? 2 :
            (isSet($_REQUEST["parimband_id"]) ? 3 : 0)));
    $kask=$yhendus->prepare("UPDATE ansamblid SET punktid =punktid+? WHERE id=?");
    $kask->bind_param("ii", $lisa, $bandi_id);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit;
}

// kommentaari lisamine tabelisse
if(isSet($_REQUEST["uue_kommentaari_id"])){
    $kask=$yhendus->prepare(
        "UPDATE ansamblid SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id=?");
    $kommentaarilisa="\n".$_REQUEST["uus_kommentaar"]."\nLisatud: ".gmdate( "H:i d.m.Y")."\n";
    $kask->bind_param("si", $kommentaarilisa, $_REQUEST["uue_kommentaari_id"]);
    $kask->execute();
}

// näitab tabelist andmeid
if (isset($_REQUEST["id"])) {
    $kask = $yhendus->prepare("SELECT id, ansamblinimi, kommentaarid, punktid, otsus, avalik FROM ansamblid WHERE id=?");
    $kask->bind_param("i", $_REQUEST["id"]);
    $kask->bind_result($id, $nimi, $kommentaarid, $punktid, $otsus, $avalik);
    $kask->execute();
    // näitab kas ansambel on avalik või peidetud
    if ($kask->fetch()) {
        $nimi = htmlspecialchars($nimi);
        $kommentaarid = nl2br(htmlspecialchars($kommentaarid));
        $avalik = $avalik == 1 ? "Avalik" : "Peidetud";
        ?>
        <!-- näitab ansambli andmeid -->
        <h2><?= $nimi ?></h2>
        <dl>
            <dt>Punkte:</dt>
            <dd><?= $punktid ?></dd>
            <dt>Avalik:</dt>
            <dd><?= $avalik ?></dd>
            <dt>Kommentaarid:</dt>
            <dd><?= $kommentaarid ?></dd>
            <dt>Otsus:</dt>
            <dd><?= $otsus ?></dd>
        </dl>
        <!-- saab lisada punkte -->
        <a href='?heaband_id=<?= $id ?>'>Lisa punkt</a><br>
        <a href='?paremband_id=<?= $id ?>'>Lisa 2 punkti</a><br>
        <a href='?parimband_id=<?= $id ?>'>3 punkti juurde</a><br>
        <a href='?viletsband_id=<?= $id ?>' style="color: crimson">1 punkt maha</a><br>
        <form action='?'>
            <input type='hidden'
                   name='uue_kommentaari_id' value='<?= $id ?>'/>
            <label>Lisa kommentaar
                <input type='text' name='uus_kommentaar'/>
            </label>
            <input type='submit' value='Saada'/>
        </form>
        <?php
        $kask->close();
    }
}
?>

<!-- välja kommenteeritud sest headeris olemas juba -->
<!--<!doctype html>-->
<!--<html lang="et">-->
<!--<head>-->
<!--    <title>Ansamblid</title>-->
<!--    <link rel="stylesheet" href="stiil.css" type="text/css"/>-->
<!--</head>-->
<!--<body>-->
<?php
////echo "PHP version: " . phpversion();
//include("navigatsioon.php");
//?>
<h1>Ansamblid</h1>
<table>
    <?php
    $kask=$yhendus->prepare("SELECT id, ansamblinimi, punktid, kommentaarid FROM ansamblid");
    $kask->bind_result($id, $ansamblinimi, $punktid, $kommentaarid);
    $kask->execute();
    while($kask->fetch()){
        $ansamblinimi=htmlspecialchars($ansamblinimi);
        $kommentaarid=nl2br(htmlspecialchars($kommentaarid));
        echo "<tr>
                    <td><a href='?id=$id'>$ansamblinimi</a></td>
                    <td>$punktid</td>                   
                  </tr>";
    }
    ?>
</table>
<!--</body>-->
<!--</html>-->
<!---->
<?php
//$yhendus->close();
//?>