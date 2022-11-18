<?php
require("../dbConfig.php");
global $yhendus;

if(isSet($_REQUEST["heabandi_id"])){
    $kask=$yhendus->prepare("UPDATE ansamblid SET punktid=punktid+1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["heabandi_id"]);
    $kask->execute();
}

if(isSet($_REQUEST["uue_kommentaari_id"])){
    $kask=$yhendus->prepare(
        "UPDATE ansamblid SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id=?");
    $kommentaarilisa="\n".$_REQUEST["uus_kommentaar"]."\n";
    $kask->bind_param("si", $kommentaarilisa, $_REQUEST["uue_kommentaari_id"]);
    $kask->execute();
}
?>
    <!doctype html>
    <html>
<head>
    <title>Ansamblid</title>
    <link rel="stylesheet" href="stiil.css" type="text/css"/>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
        td {
            padding: 0 5px ;
        }
    </style>
</head>
<body>
<?php

include("navigatsioon.php");
if (isset($_REQUEST["id"])) {
    $kask = $yhendus->prepare("SELECT id, ansamblinimi, kommentaarid, punktid FROM ansamblid WHERE id=?");
    $kask->bind_param("i", $_REQUEST["id"]);
    $kask->bind_result($id, $ansamblinimi, $kommentaarid, $punktid);
    $kask->execute();
    if ($kask->fetch()) {
        $ansamblinimi=htmlspecialchars($ansamblinimi);
        $kommentaarid=nl2br(htmlspecialchars($kommentaarid));
        ?>
        <h2><?= $ansamblinimi ?></h2>
        <dl>
            <dt>Punkte:</dt>
            <dd><?= $punktid ?></dd>
            <dt>Kommentaarid:</dt>
            <dd><?= $kommentaarid ?></dd>
        </dl>
        <a href='?heabandi_id=<?= $id ?>'>Lisa punkt</a><br/>
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
<h1>Ansamblid</h1>
<table>
    <?php
    $kask=$yhendus->prepare(
        "SELECT id, ansamblinimi, punktid, kommentaarid FROM ansamblid WHERE avalik=1");
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
</body>
</html>
<?php
$yhendus->close();
?>