<?php
require("../dbConfig.php");
global $yhendus;

// võimaldab uusi laule lisada
if(!empty($_REQUEST["uuepealkiri"])){
    $kask=$yhendus->prepare(
        "INSERT INTO laulud(pealkiri) VALUES(?)");
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
    <title>Laulud</title>
</head>
<body>
<h1>Laulud</h1>
<form action="?">
    <!-- saab uue laulu lisada -->
    <label>Uue laulu pealkiri:
        <input type="text" name="uuepealkiri" />
    </label>
    <input type="submit" value="Lisa laul" />
</form>
</body>
</html>

<?php
$yhendus->close();
?>