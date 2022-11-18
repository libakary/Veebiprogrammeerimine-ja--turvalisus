<?php
require("../dbConfig.php");
global $yhendus;

// laulule punkti lisamine, suurendab tabelis arvu
if(isSet($_REQUEST["healaulu_id"])){
    $kask=$yhendus->prepare("UPDATE laulud SET tulemus=tulemus+1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["healaulu_id"]);
    $kask->execute();
}

// laulule kommentaari lisamine, läheb tabelisse
if(isSet($_REQUEST["uue_kommentaari_id"])){
    $kask=$yhendus->prepare(
        "UPDATE laulud SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id=?");
    $kommentaarilisa="\n".$_REQUEST["uus_kommentaar"]."\n";
    $kask->bind_param("si", $kommentaarilisa, $_REQUEST["uue_kommentaari_id"]);
    $kask->execute();
}
?>
<!doctype html>
<html>
<head>
    <title>Laulud</title>
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
// näitab andmeid lehel, saadaval ainult kui kindal laulul klikitakse tho. punktide ja komm lisamine
if (isset($_REQUEST["id"])) {
    $kask = $yhendus->prepare("SELECT id, pealkiri, kommentaarid, tulemus, lisamis_aeg FROM laulud WHERE id=?");
    $kask->bind_param("i", $_REQUEST["id"]);
    $kask->bind_result($id, $pealkiri, $kommentaarid, $punktid, $lisamisaeg);
    $kask->execute();
    if ($kask->fetch()) {
        $pealkiri = htmlspecialchars($pealkiri);
        $kommentaarid = nl2br(htmlspecialchars($kommentaarid));
        ?>
        <!-- html osa koos php tükkidega et muutujaid kasutada -->
        <h2><?= $pealkiri ?></h2>
        <dl>
            <dt>Punkte:</dt>
            <dd><?= $punktid ?></dd>
            <dt>Lisatud:</dt>
            <dd><?= $lisamisaeg ?></dd>
            <dt>Kommentaarid:</dt>
            <dd><?= $kommentaarid ?></dd>
        </dl>
        <!-- kommentaari lisamine -->
        <a href='?healaulu_id=<?= $id ?>'>Lisa punkt</a><br/>
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
<h1>Laulud</h1>
<table>
    <?php
    // näitab tabelis laule ja nende punkte
    $kask=$yhendus->prepare(
        "SELECT id, pealkiri, tulemus, kommentaarid FROM laulud WHERE avalik=1");
    $kask->bind_result($id, $pealkiri, $tulemus, $kommentaarid);
    $kask->execute();
    while($kask->fetch()){
        $pealkiri=htmlspecialchars($pealkiri);
        $kommentaarid=nl2br(htmlspecialchars($kommentaarid));
        echo "<tr>
              <td><a href='?id=$id'>$pealkiri</a></td>
              <td>$tulemus</td>
              </tr>";
    }
    ?>
</table>
</body>
</html>
<?php
$yhendus->close();
?>