<?php
require("../dbConfig.php");
global $yhendus;
?>
    <!doctype html>
    <html>
<head>
    <title>Ansamblid</title>
</head>
<body>
<h1>Ansamblid</h1>
<table>
    <?php
    $kask=$yhendus->prepare(
        "SELECT id, ansamblinimi, punktid FROM ansamblid WHERE avalik=1");
    $kask->bind_result($id, $ansamblinimi, $punktid);
    $kask->execute();
    while($kask->fetch()){
        $ansamblinimi=htmlspecialchars($ansamblinimi);
        echo "<tr>
                <td>$ansamblinimi</td>
                <td>$punktid</td>
              </tr>";
    }
    ?>
</table>
</body>
</html>
<?php
$yhendus->close();
?>