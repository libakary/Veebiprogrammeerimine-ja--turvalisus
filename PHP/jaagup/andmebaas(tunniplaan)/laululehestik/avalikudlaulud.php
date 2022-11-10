<?php
require("../dbConfig.php");
global $yhendus;
?>
    <!doctype html>
    <html>
<head>
    <title>Laulud</title>
</head>
<body>
<h1>Laulud</h1>
<table>
    <?php
    $kask=$yhendus->prepare(
        "SELECT id, pealkiri, tulemus FROM laulud WHERE avalik=1");
    $kask->bind_result($id, $pealkiri, $tulemus);
    $kask->execute();
    while($kask->fetch()){
        $pealkiri=htmlspecialchars($pealkiri);
        echo "<tr>

<td>$pealkiri</td>

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