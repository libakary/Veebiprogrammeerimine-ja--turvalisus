<?php
require("../dbConfig.php");
global $yhendus;

// kas laul on peidetud
if(isSet($_REQUEST["peitmise_id"])){
    $kask=$yhendus->prepare("UPDATE laulud SET avalik=0 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["peitmise_id"]);
    $kask->execute();
}
// kas laul on nähtaval
if(isSet($_REQUEST["avamise_id"])){
    $kask=$yhendus->prepare("UPDATE laulud SET avalik=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["avamise_id"]);
    $kask->execute();
}
?>
    <!doctype html>
    <html lang="et">
    <head>
        <title>Laulud</title>
    </head>
    <body>
        <h1>Laulud</h1>
    <table>
        <?php
        $kask=$yhendus->prepare("SELECT id, pealkiri, avalik FROM laulud");
        $kask->bind_result($id, $pealkiri, $avalik);
        $kask->execute();
        // laul on peidetud
        while($kask->fetch()){
            $pealkiri=htmlspecialchars($pealkiri);
            $avamistekst="Ava";
            $avamisparam="avamise_id";
            $avamisseisund="Peidetud";
            // kui laul teha avalikuks
            if($avalik==1){
                $avamistekst="Peida";
                $avamisparam="peitmise_id";
                $avamisseisund="Avatud";
            }
            echo "<tr>
                    <td>$pealkiri</td>
                    <td>$avamisseisund</td>
                    <td><a href='?$avamisparam=$id'>$avamistekst</a></td>
                  </tr>";
        }
        ?>
    </table>
    </body>
    </html>

<?php
$yhendus->close();
?>