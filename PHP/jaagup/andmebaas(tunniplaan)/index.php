<?php

require ("dbConfig.php"); // hoida väljaspoolt veebist kättesaadavat teekonda
global $yhendus;

if(isSet($_REQUEST["uusleht"])){
    $kask=$yhendus->prepare("INSERT INTO lehed (pealkiri, sisu) VALUES (?, ?)");
    $kask->bind_param("ss", $_REQUEST["pealkiri"], $_REQUEST["sisu"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
if(isSet($_REQUEST["kustutusid"])){
    $kask=$yhendus->prepare("DELETE FROM lehed WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutusid"]);
    $kask->execute();
}
?>
<!doctype html>
<html>
<head>
    <title>Teated lehel</title>
    <style type="text/css">
        #menyykiht{
            float: left;
            padding-right: 30px;
        }
        #sisukiht{
            float:left;
        }
        #jalusekiht{
            clear: left;
        }
    </style>
    <meta charset="utf-8" />
</head>
<body>
<div id="menyykiht">
    <h2>Teated</h2>
    <ul>
        <?php
        $kask=$yhendus->prepare("SELECT id, pealkiri FROM lehed");
        $kask->bind_result($id, $pealkiri);
        $kask->execute();
        while($kask->fetch()){
            echo "<li><a href='?id=$id'>".
                htmlspecialchars($pealkiri)."</a></li>";
        }
        ?>

    </ul>
    <a href='?lisamine=jah'>Lisa ...</a>
</div>
<div id="sisukiht">
    <?php
    if(isSet($_REQUEST["id"])){
        $kask=$yhendus->prepare("SELECT id, pealkiri, sisu FROM lehed
                          WHERE id=?");
        //Kysim2rgi asemele pannakse aadressiribalt tulnud id,
        //eeldatakse, et ta on tyybist integer (i).
        //(double - d, string - s)
         $kask->bind_param("i", $_REQUEST["id"]);
         $kask->bind_result($id, $pealkiri, $sisu);
         $kask->execute();
         if($kask->fetch()){
             echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
             echo htmlspecialchars($sisu);
             echo "<br /><a href='?kustutusid=$id'>kustuta</a>";
         } else {
             echo "Vigased andmed.";
         }
     } else {
         echo "Tere tulemast avalehele! Vali men&uuml;&uuml;st sobiv teema.";
     }
    if(isSet($_REQUEST["lisamine"])){

        ?>
        <form action='?'>
            <input type="hidden" name="uusleht" value="jah" />
            <h2>Uue teate lisamine</h2>
            <dl>
                <dt>Pealkiri:</dt>
                <dd>
                    <input type="text" name="pealkiri" />
                </dd>
                <dt>Teate sisu:</dt>
                <dd>
                    <textarea rows="20" name="sisu"></textarea>
                </dd>
            </dl>
            <input type="submit" value="sisesta">
        </form>
        <?php
    }
     ?>
</div>
<div id="jalusekiht">
    Lehe tegi Jaagup
</div>
</body>
</html>
<?php
$yhendus->close();
?>