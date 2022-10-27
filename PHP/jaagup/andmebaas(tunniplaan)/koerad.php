<?php
//$yhendus=new mysqli("localhost", "tunniplaan", "W25]DLxRV5rcKFlK", "tunniplaan");
global $yhendus;

require ("dbConfig.php");
if (isset($server) && (isset($user)) && (isset($password)) && (isset($database))) {
    $yhendus=new mysqli($server, $user, $password, $database);
}
$kask=$yhendus->prepare("SELECT id, koeranimi, kirjeldus, pildiaadress FROM koerad");
$kask->bind_result($id, $koeranimi, $kirjeldus, $pildiaadress);
$kask->execute();

if(isSet($_REQUEST["uusleht"])){
    $kask = $yhendus->prepare("INSERT INTO `koerad` (`koeranimi`, `kirjeldus`, `pildiaadress`) VALUES (?, ?, ?)");
    $kask->bind_param("sss", $_REQUEST["koeranimi"], $_REQUEST["kirjeldus"], $_REQUEST["pildiaadress"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
if(isSet($_REQUEST["kustutusid"])){
    $kask=$yhendus->prepare("DELETE FROM koerad WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutusid"]);
    $kask->execute();
}

?>
<!doctype html>
<html>
<head>
    <title>Koerad lehel</title>
    <style ="text/css">
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
    <a href='?lisamine=jah'>Lisa ...</a>
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
             echo "<br /><a href='?kustutusid=$id'>kustuta</a>";
         } else {
             echo "Vigased andmed.";
         }
     } else {
         echo "Tere tulemast avalehele! Vali men&uuml;&uuml;st sobiv koer.";
     }
    if(isSet($_REQUEST["lisamine"])){

        ?>
        <form action='?'>
            <input type="hidden" name="uusleht" value="jah" />
            <h2>Uue teate lisamine</h2>
            <dl>
                <dt>Nimi:</dt>
                <dd>
                    <input type="text" name="koeranimi" />
                </dd>
                <dt>Koera kirjeldus:</dt>
                <dd>
                    <textarea rows="20" name="kirjeldus"></textarea>
                </dd>
                <dt>Pildiaadress</dt>
                <dd>
                    <input type="link" name="pildiaadress" />
                </dd>
            </dl>
            <input type="submit" value="sisesta">
        </form>
        <?php
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