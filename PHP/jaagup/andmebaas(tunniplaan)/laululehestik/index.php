<?php
require("../dbConfig.php");
global $yhendus;
if(isSet($_REQUEST["healaulu_id"])){
    $kask=$yhendus->prepare("UPDATE laulud SET tulemus=tulemus+1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["healaulu_id"]);
    $kask->execute();
}
?>

<!doctype html>
<html lang="et">
<head><title>Laulud</title>
</head>
<body>
<h1>Laulud</h1>
<table>
    <?php
    $kask=$yhendus->prepare("SELECT id, pealkiri, tulemus FROM laulud");
    $kask->bind_result($id, $pealkiri, $punktid);
    $kask->execute();
    while($kask->fetch()){
        $pealkiri=htmlspecialchars($pealkiri);
        echo "<tr>
                <td>$pealkiri</td>
                <td>$punktid</td>
                <td><a href='?healaulu_id=$id'>Lisa punkt</a></td>
              </tr>";
    }
    ?>
</table>
</body>
</html>

<?php
$yhendus->close();
?>