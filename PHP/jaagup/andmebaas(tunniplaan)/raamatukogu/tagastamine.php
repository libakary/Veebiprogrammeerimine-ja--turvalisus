<?php
// admin only leht kust raamatuid tagastada

require("../dbConfig.php");
global $yhendus;

if(isSet($_REQUEST["tagastus_id"])){
    $kask=$yhendus->prepare(
        "UPDATE raamatukogu SET saadavus=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["tagastus_id"]);
    $kask->execute();

    $kask=$yhendus->prepare(
        "UPDATE raamatukogu SET laenutus_kuup= null WHERE id=?");
    $kask->bind_param("i", $_REQUEST["tagastus_id"]);
    $kask->execute();
}
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stiil.css" type="text/css"/>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
        td {
            padding: 0 5px ;
        }
    </style>
    <title>Raamatute tagastamine</title>
</head>
<body>
<header>
    <h1>Raamatukogu</h1>
    <nav>
        <?php
        include("navigatsioon.php");
        ?>
    </nav>
</header>
<h2>Raamatute tagasi võtmine</h2>
<table>
    <?php
    $kask = $yhendus->prepare(
        "SELECT id, nimi, autor FROM raamatukogu WHERE saadavus=0");
    $kask->bind_result($id, $raamatunimi, $autor);
    $kask->execute();
    while ($kask->fetch()) {
        $raamatunimi=htmlspecialchars($raamatunimi);
        $autor=nl2br(htmlspecialchars($autor));

        echo "<tr>
              <td>$raamatunimi</td>
              <td>$autor</td>
              <td><a href='?tagastus_id=$id'>Tagasta raamat</a></td>
              </tr>";

    }
    ?>
</table>
</body>
</html>
<?php
$yhendus->close();
?>
