<?php
require ("../dbConfig.php"); //logib tunnipla kasutajaga sisse
global $yhendus;

//kustutamine
if (isset($_REQUEST["kustutusid"])) {
    $kask = $yhendus->prepare("DELETE FROM peolised WHERE `peolised`.`id` = ?");
    $kask->bind_param("i",$_REQUEST["kustutusid"]);
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
    <title>Peolehe administreerimine</title>
</head>
<body>
<h1>Registreeritud peolised</h1>

<ul>
    <?php
    $kask = $yhendus->prepare("SELECT `id`, `eesnimi`, `perenimi`, `epost` FROM `peolised`");
    $kask->bind_result($id,$eesnimi,$perenimi,$epost);
    $kask->execute();
    //ridade näitamine reakaupa
    while ($kask->fetch()) {
        echo "<li>".htmlspecialchars($eesnimi).
                " ".htmlspecialchars($perenimi).
                " ".htmlspecialchars($epost).
                " <a href='?kustutusid=$id'>kustuta</a>".
            "</li>";
    }
    ?>
</ul>

</body>
</html>
<?php
    $yhendus->close();