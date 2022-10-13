<?php

require ("dbConfig.php"); // hoida väljaspoolt veebist kättesaadavat teekonda
if (isset($server) && (isset($user)) && (isset($password)) && (isset($database))) {
    $yhendus=new mysqli($server, $user, $password, $database);
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
                     } else {
                         echo "Vigased andmed.";
                     }
                 } else {
                     echo "Tere tulemast avalehele! Vali men&uuml;&uuml;st sobiv teema.";
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