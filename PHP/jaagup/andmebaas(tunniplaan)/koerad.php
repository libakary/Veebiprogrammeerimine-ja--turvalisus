<?php
$yhendus=new mysqli("localhost", "tunniplaan", "W25]DLxRV5rcKFlK", "tunniplaan");
$kask=$yhendus->prepare("SELECT id, koeranimi, kirjeldus, pildiaadress FROM koerad");
$kask->bind_result($id, $koeranimi, $kirjeldus, $pildiaadress);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Koerad lehel</title>
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
    <h1>Koerte loetelu</h1>
    <?php

    while($kask->fetch()){

        echo "<li><a href='?id=$id'>".
            htmlspecialchars($koeranimi)."</a></li>";

    }
    ?>
</div>

<div id="sisukiht">
    <?php
    if(isset($_REQUEST["id"])){
        $kask=$yhendus->prepare("SELECT id, koeranimi, kirjeldus, pildiaadress FROM koerad
                          WHERE id=?");
        //Kysim2rgi asemele pannakse aadressiribalt tulnud id,
        //eeldatakse, et ta on tyybist integer (i).
        //(double - d, string - s)
         $kask->bind_param("i", $_REQUEST["id"]);
         $kask->bind_result($id, $koeranimi, $kirjeldus,$pildiaadress);
         $kask->execute();
         if($kask->fetch()){
             echo "<h2>".htmlspecialchars($koeranimi)."</h2>";
             echo htmlspecialchars($kirjeldus)."<br>";
             echo "<img src='$pildiaadress' alt='koer' width='500' height='600'>";
         } else {
             echo "Vigased andmed.";
         }
     } else {
         echo "Tere tulemast avalehele! Vali men&uuml;&uuml;st sobiv koer.";
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