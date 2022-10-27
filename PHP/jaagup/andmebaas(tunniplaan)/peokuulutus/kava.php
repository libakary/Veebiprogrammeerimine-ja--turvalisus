<?php
require ("../dbConfig.php"); //logib tunnipla kasutajaga sisse
global $yhendus;
?>
<!doctype html>
<html>
<head>
    <title>Peokava</title>
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
    <h2>Etteasted/Sündmused</h2>
    <ul>
        <?php
        $kask=$yhendus->prepare("SELECT `id`, `nimetus`, `kirjeldus`, `algus` FROM etteasted ORDER BY algus");
        $kask->bind_result($id, $nimetus,$kirjeldus,$algus);
        $kask->execute();
        while($kask->fetch()){
            echo "<li>$algus<a href='?id=$id'>".
                htmlspecialchars($nimetus)."</a></li>";
        }
        ?>

    </ul>
</div>
<div id="sisukiht">
    <?php
    if(isSet($_REQUEST["id"])){
        $kask=$yhendus->prepare("SELECT id, nimetus, kirjeldus, algus FROM etteasted WHERE id=?");
        //Kysim2rgi asemele pannakse aadressiribalt tulnud id,
        //eeldatakse, et ta on tyybist integer (i).
        //(double - d, string - s)
        $kask->bind_param("i", $_REQUEST["id"]);
        $kask->bind_result($id, $nimetus, $kirjeldus, $algus);
        $kask->execute();
        if($kask->fetch()){
            $algusAeg = date_create($algus);
            echo "<h2>".date_format($algusAeg, "d.m.Y H:i")." ".htmlspecialchars($nimetus)."</h2>";
            echo htmlspecialchars($kirjeldus);
        } else {
            echo "Vigased andmed.";
        }

    }
    ?>
</div>
<div id="jalusekiht">
    Lehe tegi Karol
</div>
</body>
</html>
<?php
$yhendus->close();
?>
