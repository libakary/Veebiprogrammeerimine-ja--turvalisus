<?php
require("../dbConfig.php");
global $yhendus;
if(isSet($_REQUEST["heaband_id"]) or
    isSet($_REQUEST["paremband_id"]) or
    isSet($_REQUEST["parimband_id"])) {
    // ?? coalescing operator alla 7 phps ?? ei tööta.
    $bandi_id = $_REQUEST["heaband_id"]??
                    $_REQUEST["paremband_id"]??
                        $_REQUEST["parimband_id"];
    $lisa = isSet($_REQUEST["heaband_id"]) ? 1 :
                (isSet($_REQUEST["paremband_id"]) ? 2 :
                    (isSet($_REQUEST["parimband_id"]) ? 3 : 0));
    $kask=$yhendus->prepare("UPDATE ansamblid SET punktid =punktid+? WHERE id=?");
    $kask->bind_param("ii", $lisa, $bandi_id);
    $kask->execute();
}
?>

<!doctype html>
<html lang="et">
<head>
    <title>Ansamblid</title>
</head>
<body>
<?php echo "PHP version: " . phpversion(); ?>
<h1>Ansamblid</h1>
<table>
    <?php
    $kask=$yhendus->prepare("SELECT id, ansamblinimi, punktid FROM ansamblid");
    $kask->bind_result($id, $ansamblinimi, $punktid);
    $kask->execute();
    while($kask->fetch()){
        $ansamblinimi=htmlspecialchars($ansamblinimi);
        echo "<tr>
                <td>$ansamblinimi</td>
                <td>$punktid</td>
                <td><a href='?heaband_id=$id'>Lisa punkt</a></td>
                <td><a href='?paremband_id=$id'>Lisa 2 punkti</a></td>
                <td><a href='?parimband_id=$id'>Lisa 3 punkti</a></td>
              </tr>";
    }
    ?>
</table>
</body>
</html>

<?php
$yhendus->close();
?>