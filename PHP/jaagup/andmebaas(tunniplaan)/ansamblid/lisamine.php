<?php
require("../dbConfig.php");
global $yhendus;

if(!empty($_REQUEST["uuepealkiri"])){
    $kask=$yhendus->prepare(
        "INSERT INTO ansamblid(ansamblinimi) VALUES(?)");
    $kask->bind_param("s", $_REQUEST["uuepealkiri"]);
    $kask->execute();
    echo $yhendus->error;
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
?>

<!doctype html>
<html lang="et">
<head>
    <title>Ansamblid</title>
</head>
<body>
<h1>Ansamblid</h1>
<form action="?">
    <label>Uus ansambel:
        <input type="text" name="uuepealkiri" />
    </label>
    <input type="submit" value="Lisa ansambel" />
</form>
</body>
</html>

<?php
$yhendus->close();
?>