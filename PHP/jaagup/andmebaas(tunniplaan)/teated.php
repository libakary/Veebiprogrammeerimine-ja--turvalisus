<?php

require ("dbConfig.php"); // hoida väljaspoolt veebist kättesaadavat teekonda
if (isset($server) && (isset($user)) && (isset($password)) && (isset($database))) {
    $yhendus=new mysqli($server, $user, $password, $database);
}

$kask=$yhendus->prepare("SELECT id, pealkiri, sisu FROM lehed");
$kask->bind_result($id, $pealkiri, $sisu);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Teated lehel</title>
</head>
<body>
    <h1>Teadete loetelu</h1>
<?php
    while($kask->fetch()){
        echo "<h2>".htmlspecialchars($pealkiri)."</h2>";
        echo "<div>".htmlspecialchars($sisu)."</div>";
    }
?>

</body>
</html>

<?php
    $yhendus->close();
?>